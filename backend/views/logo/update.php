<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Logo */

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

$this->title = 'Update: ' . ' ' . $result;
$this->params['breadcrumbs'][] = ['label' => 'Setting Logo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $result, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
