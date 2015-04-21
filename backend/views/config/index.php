<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'com',
                'value' => function($model){
                    $result = '';
                    switch($model->com) {
                        case 'about':
                            $result = 'About Us';
                            break;
                        case 'contact':
                            $result = 'Contact Us';
                            break;
                        case 'footer':
                            $result = 'Footer Content';
                            break;
                        case 'video':
                            $result = 'Video Clip';
                            break;
                        default:
                            $result = 'About Us';
                            break;
                    }
                    return $result;
                },
            ],                        
            'title',
            'description:ntext',
            'keyword:ntext',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>

</div>
