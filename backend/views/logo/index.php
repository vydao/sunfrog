<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Logos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
	            'attribute'=>'photo',
	            'label'=>'Ảnh',
            	'format'=>'raw',            
	            'content'=>function($data){
            		if( !empty($data->photo) )
	            		return Html::img($data->imageUrl(),['style'=>'max-width:80px;max-height: 80px;']); 
	            	else 
	            	  return null;          
	            },
	           'options'=>['style'=>'width:80px;']
            ], 
            [
                'attribute' => 'com',
                'value' => function($model){
                    $result = '';
                    switch($model->com) {
                        case 'logo':
                            $result = 'Logo';
                            break;
                        case 'slider':
                            $result = 'Slider';
                            break;                        
                        default:
                            $result = 'Logo';
                            break;
                    }
                    return $result;
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>

</div>
