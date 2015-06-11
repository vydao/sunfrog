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
use yii\data\Pagination;


class ProductsController extends \yii\web\Controller
{
	public $layout = 'dashboard';
    public $page_size = 24;
    
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
    	}
        if(Yii::$app->request->post('category_url')){
            $cate_urls = Yii::$app->request->post('category_url');
            if(!empty($cate_urls)){                
                $url_list = explode(';', $cate_urls);
                $url_shirt = 'http://www.sunfrogshirts.com';
                foreach($url_list as $url){
                    if(strlen($url) > 0 && !$this->is_404($url)){
                        $html = file_get_html($url);
                        $links = $html->find('div.frameit a'); //Get Product size                        
                        if(!empty($links)){
                            foreach ($links as $link) {
                                $product_url = $url_shirt . $link->href;
                                $this->_getProductData($product_url);
                            }    		        
			            }
    				}
    			}
        	}
    	}

        $query = Product::find();
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => $this->page_size
        ]);
        $products = $query->orderBy('created_ts DESC')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $categories = Category::find()
            ->indexBy('id')
            ->orderBy('priority ASC')
            ->all();

        return $this->render('index', [
                'categories' => $categories,
                'products' => $products,
                'pages' => $pages
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

    public function is_404($url) {
        $handle = curl_init($url);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

        /* Get the HTML or whatever is linked in $url. */
        $response = curl_exec($handle);

        /* Check for 404 (file not found). */
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        /* If the document has loaded successfully without any redirection or error */
        if ($httpCode >= 200 && $httpCode < 300) {
            return false;
        } else {
            return true;
        }
    }

    private function _getProductData($url){
        $url = trim($url);
        if(strlen($url) > 0 && !$this->is_404($url)){
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
            if(isset($product_name->innertext) && !empty($product_name->innertext)){    //Only save product if it has name
                $product_info['name'] = $product_name->innertext;

                $img = $html->find('img.lg_view', 0); //Get Product image
                
                 $src = 'http:' . $img->src;    
                 $file_name = urldecode(end(explode('/', $img->src)));
                if(isset($img->src) && @copy($src, $imgdir . $file_name) ){                    
                    $product_info['image'] = $file_name;                                   
                }

                $price = $html->find('span.priceshow', 0); //Get Product size
                if(isset($price->innertext)){
                    $product_price = end(explode('$', $price->innertext));
                    $product_info['price'] = $product_price;
                }

                $description = $html->find('div.explain p', 1); //Get Product description
                if(isset($description->innertext)){
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
}
