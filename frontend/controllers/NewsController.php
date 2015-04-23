<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\components\CController;
use common\models\News;
use common\models\Config;

class NewsController extends CController
{
    public function actionIndex()
    {
    	$data = Config::find()->select('content, title, description, keyword')->where('com="news"')->one();
    	 
		$this->title = 'News';
		
		$this->title = 'News' . ((isset($data->title) && !empty($data->title)) ? $data->title : '');
		    	 
    	$models = News::find()
    		->orderBy('featured DESC, created_date DESC')
    		->all();
    	$dataProvider = new ActiveDataProvider([
    		'query'=>News::find()
	    		->orderBy('featured DESC, created_date DESC'),
	    	'pagination' => [
            	'pageSize' => 10,
        	],
    	]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
	
    /**
     * view detail of news
     * @param int $id
     */
    public function actionView($id)
    {
    	$model = News::find()->where(['id'=>$id])->one();
    	return $this->render('view', array('model'=>$model));
    }
}
