<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	
    <?= $form->field($model, 'title')->textInput() ?>
	
	<?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
	
	<?= $form->field($model, 'image')->fileInput() ?>
	
	<?php 
		if(!$model->isNewRecord && !empty($model->image) ) : ?>
	<div class="form-group news-image">
		<img alt="" src="<?= Yii::$app->params['site_url'] . '/uploads/news/' . $model->image ?>">
	</div>
	<?php endif;?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_keyword')->textInput() ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'meta_title')->textInput() ?>
	
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
    <?php ActiveForm::end(); ?>

</div>
