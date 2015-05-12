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
				<label class="label-char"> Category</label>
				<select name="category" class="form-control" style="width:45%">
					<option value="">Select a category</option>
				<?php if(!empty($categories)){ ?>
					<?php foreach ($categories as $key => $category) { ?>
						<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
					<?php } ?>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<?= Html::submitButton('Get Data', ['class' => 'btn btn-success']) ?>
			</div>
		</div>
	<?= Html::endForm() ?>
	<div class="style:clear:both"></div>
	<div class="col-md-12">
		<?php if(!empty($products)){ ?>
		<h3>All Products</h3>
			<?php foreach($products as $key => $product){ ?>
					<a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['products/view/' . $product->id]); ?>">
						<div class="col-md-2">
							<img width="100%" src="<?php echo Yii::$app->params['frontendUrl'] . '/uploads/products/' . $product->image; ?>"/>
							<span><?php echo $product->name; ?></span>
						</div>
					</a>
			<?php } ?>
		<?php } ?>
	</div>
</div>