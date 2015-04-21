<?php
/* @var $this yii\web\View */

$this->title = '';
$url = Yii::$app->params['_url'];
?>
<div class="row">
	<div class="col-md-8">
		<h3><?php echo $model->name; ?></h3>
		<img class="product-detail-image" src="<?php echo Yii::$app->request->baseUrl; ?>/img/<?php echo $model->image ?>" border="0" />
		<p class="product-name"><?php echo $model->name; ?></p>
		<p class="text-desciption"><?php echo ($model->description) ? $model->description : ''; ?></p>
		
		<div class="product_space" style="width:100%"></div>
		<p algin="center">
		<button onclick="location.href='<?php echo $model->original_url; ?>'" class="button orangeb leftd large view-more">View Details</button>
		</p>
		<!-- <h4 class="size-details">T–Shirt Sizing and Details</h4>
		<div><?php //echo $model->size; ?></div>
		<div><?php //echo $model->details; ?></div> -->
		<div style="clear:both"></div>
		<h4 class="related-product-text">Related Products</h4>
		<?php if(!empty($related_products)){ ?>
				<?php foreach($related_products as $key => $product){ ?>
					<img class="col-md-3 related-product" src="<?php echo Yii::$app->request->baseUrl; ?>/img/<?php echo $product->image ?>" border="0" />
				<?php } ?>
		<?php } ?>

	</div>
	<div class="col-md-4">

	</div>
</div>