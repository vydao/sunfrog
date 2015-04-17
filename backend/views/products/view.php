<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Products Details';
?>
<div class="row">
	<?= $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
		<div class="col-xs-12 col-sm-9 col-md-6">
			<div class="form-group">
				<label class="label-char"> Product URL</label>
				<?= $form->field($model, 'orginal_url')->textInput(['class' => 'form-control']); ?>
			</div>
			<div class="form-group">
				<?= Html::submitButton('Get Data', ['class' => 'btn btn-success']) ?>
			</div>
		</div>
	<?= $form = ActiveForm::end() ?>
</div>