<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'options'=>['style'=>'width:50px;']
            ],            
            [
	            'attribute'=>'image',
	            'label'=>'Image',
            	'format'=>'raw',            
	            'content'=>function($data){
            		if( !empty($data->image) )
	            		return Html::img($data->imageUrl(),['alt'=>$data->title, 'style'=>'max-width:80px;max-height: 80px;']); 
	            	else 
	            	return null;          
	            },
	           'options'=>['style'=>'width:80px;']
            ],   
            'title:ntext',
            [
	            'attribute'=>'created_date',
	            'label'=>'Created Date',
            	'format'=>'raw',            
	            'content'=>function($data){
	            	return date('d M Y H:i', $data->created_date);            
	            },
	            'options'=>['style'=>'width:150px;']
            ], 
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update} {delete}',
            'options'=>['style'=>'width:80px;']
            ],
        ],
    ]); ?>

</div>
