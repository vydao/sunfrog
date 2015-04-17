<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Manage Products';
?>
<div class="row">
	<?= Html::beginForm() ?>
		<div class="col-xs-12 col-sm-9 col-md-6">
			<div class="form-group">
				<label class="label-char"> Product URL</label>
				<?= Html::textInput('product_url', '', ['class' => 'form-control']) ?>
			</div>
			<div class="form-group">
				<?= Html::submitButton('Get Data', ['class' => 'btn btn-success']) ?>
			</div>
		</div>
	<?= Html::endForm() ?>
</div>