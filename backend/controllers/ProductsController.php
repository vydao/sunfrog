<?php
namespace backend\controllers;

set_time_limit(0);

require('../vendor/simple_html_dom.php');
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Product;
use common\models\Category;


class ProductsController extends \yii\web\Controller
{
	public $layout = 'dashboard';
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view', 'edit', 'index', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],            
        ];
    }

    public function actionIndex()
    {
    	if(Yii::$app->request->post('product_url')){
            $prod_urls = Yii::$app->request->post('product_url');
            if(!empty($prod_urls)){
                $url_list = explode(';', $prod_urls);
            foreach($url_list as $url){
                   $this->_getProductData($url);
                }
            }
    	}else if(Yii::$app->request->post('category_url')){
            $cate_urls = Yii::$app->request->post('category_url');
            if(!empty($cate_urls)){
                $url_list = explode(';', $cate_urls);
                foreach($url_list as $url){
    		$html = file_get_html($url);
                    $links = $html->find('div.frameit a'); //Get Product size
                    if(!empty($links)){
                        foreach ($links as $key => $link) {
                            $product_url = $url . $link->href;
                            $this->_getProductData($product_url);
			}
				}
			}
    	}
    	}

        $products = Product::find()
            ->select('id, image, name, created_ts')
            ->indexBy('id')
            ->orderBy('created_ts DESC')
            ->all();

        $categories = Category::find()
            ->indexBy('id')
            ->orderBy('priority ASC')
            ->all();

        return $this->render('index', [
                'categories' => $categories,
                'products' => $products
            ]);
    }

    public function actionView(){
    	$product_id = Yii::$app->request->get('id');
    	if(!empty($product_id)){
    		$product = Product::find()->where('id=:id', [':id' => $product_id])->one();
    		if($product){
    			return $this->render('view', ['model' => $product]);
    		}else{
    			throw new Exception("Page not found", 1);
    		}
    	}else{
    		throw new Exception("Error Processing Request", 1);
    	}
    }

    public function actionEdit(){
    	$product_id = Yii::$app->request->get('id');
    	if(!empty($product_id)){
    		$product = Product::find()->where('id=:id', [':id' => $product_id])->one();
    		if($product){
    			if(Yii::$app->request->post('Product')){

                    $org_img = $product->image;
					$imgdir = Yii::getAlias('@uploadPath') . '/products/';
    				$product->attributes = Yii::$app->request->post('Product');

    				$file = UploadedFile::getInstanceByName("Product[image]");
					if(!empty($file)){
						$file->saveAs($imgdir . $file->name, true);
						$product->image = $file->name;
    				}else{
                        $product->image = $org_img;
                    }

    				if($product->validate() && $product->save()){
    					Yii::$app->session->setFlash('success', 'Product has been saved.');
    					return $this->refresh();
    				}
    			}

                 $categories = Category::find()
                    ->indexBy('id')
                    ->orderBy('priority ASC')
                    ->all();

    			return $this->render('edit', ['model' => $product, 'categories' => $categories]);
    		}else{
    			throw new Exception("Page not found", 1);
    		}
    	}else{
    		throw new Exception("Error Processing Request", 1);
    	}
    }

    public function actionDelete(){
        $product_id = Yii::$app->request->get('id');
        if(!empty($product_id)){
            $product = Product::find()->where('id=:id', [':id' => $product_id])->one();
            if($product && $product->delete()){
                return $this->redirect(['index']);
            }else{
                throw new Exception("Page not found", 1);
            }
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    }

    private function _getProductData($url){
        $url = trim($url);
        if(strlen($url) > 0){
            $product_model = new Product();
            $product_info = [
                'category_id' => '',
                'name' => '',
                'description' => '',
                'size'  => '',
                'price' => 0.00,
                'details' => '',
                'original_url' => '',
                'created_ts' => date('Ymd')
            ];

            $category = Yii::$app->request->post('category');
            if(!empty($category)){
                $product_info['category_id'] = $category;
            }

            $imgdir = Yii::getAlias('@uploadPath') . '/products/';

            $html = file_get_html($url);
            $product_info['original_url'] = $url;
            $product_name = $html->find('h1.top_title', 0); // Get Product name
            if(!empty($product_name)){
                $product_info['name'] = $product_name->innertext;
            }

            $img = $html->find('img.lg_view', 0); //Get Product image
            if(!empty($img)){
                $file_name = urldecode(end(explode('/', $img->src)));
                $product_info['image'] = $file_name;
                copy($img->src, $imgdir . $file_name);
            }

            $price = $html->find('span.priceshow', 0); //Get Product size
            if(!empty($price)){
                $product_price = end(explode('$', $price->innertext));
                $product_info['price'] = $product_price;
            }

            $description = $html->find('div.explain p', 1); //Get Product description
            if(!empty($description)){
                $product_info['description'] = trim($description->innertext);
            }

            $product_model->attributes = $product_info;
            if($product_model->validate()){
                if($product_model->save()){
                    //return $this->redirect(['products/view/' . $product_model->id]);
                    //return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('saveErr', 'An error occurred. Please try again!');
                }
            }else{
                Yii::$app->session->setFlash('saveErr', 'An error occurred. Please try again!');
            }
        }
    }
}
