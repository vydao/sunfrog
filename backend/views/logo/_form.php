<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Logo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    <div class="col-lg-6">
        <?= $form->field($model, 'photo')->fileInput() ?>
    </div>
    <div class="col-lg-6">
        <?=Html::img($model->imageUrl(),['style'=>'max-width:100px;max-height: 100px;'])?>
    </div>
    <div class="clearfix"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
