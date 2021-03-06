<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Logo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="col-lg-6">
        <?= $form->field($model, 'photo')->fileInput() ?>
        <small style="color: #000BDA;">(Best size : 135 x 51 px.)</small>
    </div>
	
	<div class="col-lg-6">
        <?=Html::img($model->imageUrl(),['style'=>'max-width:200px;'])?>
    </div>
   <div class="clearfix"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
    <?php ActiveForm::end(); ?>

</div>
