<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
use common\models\Config;
use common\models\Logo;

use app\components\CController;

use common\models\Product;
use common\models\ProductSearch;
use common\models\Category;
use common\models\Setting;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends CController
{
	/**
     * @inheritdoc
     */
    public $is_home_page = false;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	$session = Yii::$app->session;
    	$session->remove('category');
    	
        $this->is_home_page = true;
        $slider = Logo::find()->select('photo, name')->where('com="slider"')->one();

        $search_params = Yii::$app->request->get('SEARCH');
        if(!empty($search_params)){
            $searchModel = new ProductSearch();
            $search_params = strip_tags($search_params);
            $products = $searchModel->search($search_params);

        }else{
            $products = Product::find()
                      ->select('id, image, name, original_url, price')
                      ->indexBy('id')
                      ->orderBy('created_ts DESC')
                      ->limit(40)
                      ->all();
        }
        return $this->render('index', ['products' => $products, 'search' => false, 'slider' => $slider]);
    }
    
	/*
	 * search product
	 */
 	public function actionSearch()
    {
    	$session = Yii::$app->session;
    	
        $this->is_home_page = false;
        $slider = Logo::find()->select('photo, name')->where('com="slider"')->one();

        $search_param = Yii::$app->request->get('search');
        $cId_param = Yii::$app->request->get('cId');
        $cName_param = Yii::$app->request->get('cName');
        $search_params = ['cId'=>strip_tags($cId_param),'cName'=>strip_tags($cName_param),'search'=>strip_tags($search_param)];
      
        if( !empty($search_param) || $cId_param ){
            $searchModel = new ProductSearch();
            
            $products = $searchModel->search($search_params);
        }else{
            $products = Product::find()
                      ->select('id, image, name, original_url, price')
                      ->indexBy('id')
                      ->orderBy('created_ts DESC')
                      ->limit(40)
                      ->all();
        }
        
        return $this->render('index', ['products' => $products, 'search' => true, 'search_text' => $search_param, 'slider' => $slider]);
    }
    
    public function actionContact()
    {
    	$session = Yii::$app->session;
    	$session->remove('category');
    	
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            $data = Config::find()->select('content, title, description, keyword')->where('com="contact"')->one();
            
            return $this->render('contact', [
                'model' => $model,
                'data' => $data,
            ]);
        }
    }

    public function actionAbout()
    {
        $data = Config::find()->select('content, title, description, keyword')->where('com="about"')->one();
        return $this->render('about', [
            'data' => $data,
        ]);
    }

    public function actionDetail()
    {
        $product_id = Yii::$app->request->get('id');
        if(!empty($product_id)){
            $product = Product::find()->where('id=:id', [':id' => $product_id])->one();
            if($product){
                $related_products = Product::find()
                    ->select('id, image, price, original_url')
                    ->where('category_id=:id', [':id' => $product->category_id])
                    ->orderBy('rand()')
                    ->limit(8)
                    ->all();
                $setting_id = Setting::find()->select('name,value')->where('active = 1')->one();
                return $this->render('detail', 
                	[
	                	'product' => $product, 
	                	'related_products' => $related_products, 
	                	'setting_id' => $setting_id ? $setting_id->name : ''
                	]
                );
            }else{
                throw new Exception("Page not found", 1);
            }
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    }

    public function actionCategory()
    {
    	$cate_id = Yii::$app->request->get('id');
    	
    	if(!empty($cate_id)){
    		$session = Yii::$app->session;
    		$category = Category::findOne($cate_id);
    		$session['category'] = ['id'=>$cate_id,'name'=>$category->name];
            $query = Product::find()->where('category_id=:id', [':id' => $cate_id]);
            $countQuery = clone $query;
            $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'defaultPageSize' => 40
            ]);
            $products = $query->where('category_id=:id', [':id' => $cate_id])
                          	->orderBy('created_ts DESC')
			                ->offset($pages->offset)
			                ->limit($pages->limit)
			                ->all();

            $category = Category::find()->where('id=:id', [':id' => $cate_id])->one();
            return $this->render('category', ['products' => $products, 'pages' => $pages, 'category' => $category]);
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    }
}
