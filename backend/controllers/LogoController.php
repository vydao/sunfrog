<?php

namespace backend\controllers;

use Yii;
use common\models\Logo;
use common\models\LogoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogoController implements the CRUD actions for Logo model.
 */
class LogoController extends Controller
{
	public $layout = 'dashboard';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $model = Logo::find()->orderBy('id')->one();
		
        if( $model === null )
        {
        	$model = new Logo();
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
        }
        
        return $this->render('update', [
        	'model' => $model
        ]);
        
    }

    /**
     * Finds the Logo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Logo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Logo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
