<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>

    <div <?php echo (($model->com != 'video') ? ' class="tinymce_tag"' : '') ?>>
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    </div> 
    <div class="clear"></div>
    
    <?php
    if(!in_array($model->com, array('video', 'footer'))) {
    ?>
    
        <?= $form->field($model, 'title')->textInput(['maxlength' => 250]) ?>
    
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    
        <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>
    
    <?php
    }    
    ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
