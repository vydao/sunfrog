<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting ID';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create New ID', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
	            'attribute'=>'active',	                     
	            'value'=>function($data){
            		return ($data->active == 1 ? 'Active' : 'Deactive');      
	            },	          
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
