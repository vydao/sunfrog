<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Config */

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

$this->title = 'Update: ' . ' ' . $result;
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
