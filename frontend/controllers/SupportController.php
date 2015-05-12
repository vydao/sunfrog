<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\components\CController;
use common\models\Support;
use common\models\Config;

class SupportController extends CController
{
    public function actionIndex()
    {
    	$data = Config::find()->select('content, title, description, keyword')->where('com="support"')->one();
    	 
		$this->title = 'Support';
		    	 
    	$models = Support::find()
    		->orderBy('featured DESC, created_date DESC')
    		->all();
    		
    	$dataProvider = new ActiveDataProvider([
    		'query'=>Support::find()->orderBy('featured DESC, created_date DESC'),
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
    	$model = Support::find()->where(['id'=>$id])->one(); 
    	$model->view_count = $model->view_count + 1;
    	$model->save();
    	return $this->render('view', array('model'=>$model));
    }
}
