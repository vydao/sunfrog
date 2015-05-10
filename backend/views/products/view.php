<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Products Details';
?>
<div class="row">
	<div class="col-xs-12 col-md-9">
		<div class="form-group">
			<label class="label-char">Product URL</label>
			<div><?php echo $model->original_url; ?></div>
		</div>

		<div class="form-group">
			<label class="label-char">Product Name</label>
			<div><?php echo $model->name; ?></div>
		</div>

		<div class="form-group">
			<label class="label-char">Category</label>
			<div><?php echo (isset($model->category[0])) ? $model->category[0]->name : 'Not set'; ?></div>
		</div>

		<div class="form-group">
			<label class="label-char">Image</label>
			<div><img class="product-img" src="<?php echo (!empty($model->image)) ? Yii::$app->params['frontendUrl'] . '/uploads/products/' . $model->image : ''; ?>" alt="image" /></div>
		</div>

		<div class="form-group">
			<label class="label-char">Description</label>
			<div><?php echo $model->description; ?></div>
		</div>

		<div class="form-group">
			<label class="label-char">Size</label>
			<div><?php echo $model->size; ?></div>
		</div>

		<div class="form-group">
			<label class="label-char">Details</label>
			<div><?php echo $model->details; ?></div>
		</div>

		<div class="form-group">
			<a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['products']); ?>" class="btn btn-default">Back</a>
			<a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['products/edit', 'id' => $model->id]); ?>" class="btn btn-primary pull-right">Edit</a>
		</div>
	</div>
</div>