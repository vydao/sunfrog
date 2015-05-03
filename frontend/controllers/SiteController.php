<?php
namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use common\models\Config;

use common\models\Product;
use common\models\Category;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init(){
        Yii::$app->params['left_menu'] = $this->_getLeftMenu();
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'about', 'contact', 'error'],
                'rules' => [
                    [
                        'actions' => ['index', 'about', 'contact', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
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
        $products = Product::find()
                      ->select('id, image, name, original_url')
                      ->indexBy('id')
                      ->orderBy('created_ts DESC')
                      ->limit(40)
                      ->all();
        return $this->render('index', ['products' => $products]);
    }

    public function actionContact()
    {
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
                    ->select('id, image')
                    ->where('category_id=:id', [':id' => $product->category_id])
                    ->orderBy('rand()')
                    ->limit(8)
                    ->all();
                return $this->render('detail', ['model' => $product, 'related_products' => $related_products]);
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
            $products = Product::find()
                          ->where('category_id=:id', [':id' => $cate_id])
                          ->orderBy('created_ts DESC')
                          ->all();
            return $this->render('category', ['products' => $products]);
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    }

    private function _getLeftMenu(){
         return Category::find()
                    ->indexBy('id')
                    ->orderBy('priority ASC')
                    ->all();
    }
}
