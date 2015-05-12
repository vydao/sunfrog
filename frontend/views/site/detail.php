<?php
/* @var $this yii\web\View */

$this->title =  $model->name;
$url = Yii::$app->params['_url'];
?>
<div class="row">
	<div class="col-md-8">
		<h3><?php echo $model->name; ?></h3>
		<a target="_blank" href="<?php echo $model->original_url; ?>">
		<img class="product-detail-image" src="<?php echo Yii::$app->request->baseUrl; ?>/uploads/products/<?php echo $model->image ?>" border="0" />
		</a>
		<p class="product-name"><?php echo $model->name; ?></p>
		<p class="text-desciption"><?php echo ($model->description) ? $model->description : ''; ?></p>
		
		<div class="product_space" style="width:100%"></div>
		<div style="clear:both;overflow:hidden">
		<button onclick="location.href='<?php echo $model->original_url; ?>'" class="button orangeb leftd large view-more">View Details</button>
		</div>
		<h4 class="size-details">T–Shirt Sizing and Details</h4>
		<div><?php echo $model->size; ?></div>
		<div><?php echo $model->details; ?></div>
		<div style="clear:both"></div>
		<h4 class="related-product-text">Related Products</h4>
		<?php if(!empty($related_products)){ ?>
				<?php foreach($related_products as $key => $product){ ?>
					<a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['detail/' . $product->id]); ?>" >
					<img class="col-md-3 related-product" src="<?php echo Yii::$app->request->baseUrl; ?>/uploads/products/<?php echo $product->image ?>" border="0" />
					</a>
				<?php } ?>
		<?php } ?>

	</div>
	<div class="col-md-4">
		<h4 class="size-details text-uppercase">you may also like these:</h4>
		<?php if(!empty($related_products)){ ?>
				<?php foreach($related_products as $key => $product){ ?>
					<a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['detail/' . $product->id]); ?>" >
					<img class="also-like-product" src="<?php echo Yii::$app->request->baseUrl; ?>/uploads/products/<?php echo $product->image ?>" border="0" />
					</a>
				<?php } ?>
		<?php } ?>
		<button onclick="location.href='<?php echo $model->original_url; ?>'" style="width:100%;margin-top:20px;" class="button orangeb leftd large view-more">Buy Now</button>
	</div>
</div>