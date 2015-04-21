<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Products Edit';
?>
<div class="row">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="col-xs-12 col-md-9">
		<div class="form-group">
			<label class="label-char">Product URL</label>
			<?= $form->field($model, 'original_url')->textInput(['class' => 'form-control'])->label(false) ?>
		</div>

		<div class="form-group">
			<label class="label-char"> Category</label>
			<select name="Product[category_id]" class="form-control" style="width:45%">
				<option value="">Select a category</option>
			<?php if(!empty($categories)){ ?>
				<?php foreach ($categories as $key => $category) { ?>
					<option value="<?php echo $category->id; ?>" <?php echo ($category->id == $model->category_id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
				<?php } ?>
			<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label class="label-char">Product Name</label>
			<?= $form->field($model, 'name')->textInput(['class' => 'form-control'])->label(false) ?>
		</div>

		<div class="form-group">
			<label class="label-char">Image</label>
			<div>
				<img class="product-img" src="<?php echo (!empty($model->image)) ? Yii::$app->params['frontendUrl'] . '/img/' . $model->image : ''; ?>" alt="image" />
				<?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'style' => 'width:50%'])->label(false) ?>
			</div>
		</div>

		<div class="form-group">
			<label class="label-char">Description</label>
			<?= $form->field($model, 'description')->textArea(['class' => 'form-control', 'rows' => 5])->label(false) ?>
		</div>

		<div class="form-group">
			<a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['products']); ?>" class="btn btn-default">Back</a>
			<?= Html::submitButton('Save', ['class' => 'btn btn-success pull-right']) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>
</div>