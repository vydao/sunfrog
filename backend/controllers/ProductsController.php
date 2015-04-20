<?php
namespace backend\controllers;

require('../../vendor/simple_html_dom.php');
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Product;

class ProductsController extends \yii\web\Controller
{
	public $layout = 'dashboard';

    public function actionIndex()
    {
    	if(Yii::$app->request->post('product_url')){
    		$product_model = new Product();
    		$product_info = [
	    		'name' => '',
	    		'description' => '',
	    		'size'	=> '',
	    		'details' => '',
	    		'original_url' => '',
	    		'created_ts' => date('Ymd')
    		];
    		$imgdir = Yii::getAlias('@frontend/web/img/');
    		$url = trim(Yii::$app->request->post('product_url'));

    		$html = file_get_html($url);
    		$product_info['original_url'] = $url;
    		$product_name = $html->find('h1', 0); // Get Product name
			if(!empty($product_name)){
				$product_info['name'] = $product_name->innertext;
			}

			$img = $html->find('a.highslide img', 0); //Get Product image
			if(!empty($img)){
				$file_name = end(explode('/', $img->src));
				$product_info['image'] = urldecode($file_name);
				copy($img->src, $imgdir . $file_name);
			}

			$size = $html->find('table.size_specs', 0); //Get Product size
			if(!empty($size)){
				$product_info['size'] = $size->outertext;
			}

			$details = $html->find('ul.sizespecs ', 0); //Get Product details
			if(!empty($details)){
				$product_info['details'] = $details->outertext;
			}

			$description = $html->find('.storyBox', 0)->find('text', 2); //Get Product description
			if(!empty($description)){
				$product_info['description'] = trim($description->innertext);
			}

			$product_model->attributes = $product_info;
			if($product_model->validate()){
				if($product_model->save()){
					return $this->redirect(['products/view/' . $product_model->id]);
				}else{
					Yii::$app->session->setFlash('saveErr', 'An error occurred. Please try again!');
				}
			}else{
				Yii::$app->session->setFlash('saveErr', 'An error occurred. Please try again!');
			}
    	}

        return $this->render('index');
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

					$imgdir = Yii::getAlias('@frontend/web/img/');
    				$product->attributes = Yii::$app->request->post('Product');

    				$file = UploadedFile::getInstanceByName("Product[image]");
					if(!empty($file)){
						$file->saveAs($imgdir . $file->name, true);
						$product->image = $file->name;
    				}

    				if($product->validate() && $product->save()){
    					Yii::$app->session->setFlash('success', 'Product has been saved.');
    					return $this->refresh();
    				}
    			}

    			return $this->render('edit', ['model' => $product]);
    		}else{
    			throw new Exception("Page not found", 1);
    		}
    	}else{
    		throw new Exception("Error Processing Request", 1);
    	}
    }

}
