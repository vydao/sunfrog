<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Manage Products';
?>
<div class="row">
	<?= Html::beginForm() ?>
		<div class="col-xs-12 col-sm-9 col-md-6">
			<div class="form-group">
				<label class="label-char"> Product URL</label>
				<?= Html::textArea('product_url', '', ['class' => 'form-control', 'rows' => 25]) ?>
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

	<?= Html::beginForm() ?>
		<h3>Get Products by Category</h3>
		<div class="col-xs-12 col-sm-9 col-md-6">
			<div class="form-group">
				<label class="label-char"> Category URL</label>
				<?= Html::textArea('category_url', '', ['class' => 'form-control', 'rows' => 5]) ?>
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
							<img width="100%" style="max-height:138px !important;" src="<?php echo $product->imageUrl; ?>"/>
							<span><?php echo (strlen($product->name) > 15) ? substr($product->name, 0, 14) . '...' : $product->name; ?></span>
						</div>
					</a>
			<?php } ?>
			<?php echo LinkPager::widget([
			    'pagination' => $pages,
			]); ?>
		<?php } ?>
	</div>
</div>