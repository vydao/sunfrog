<?php
/* @var $this yii\web\View */

$this->title =  $product->name;
$url = Yii::$app->params['_url'];
?>
<div class="container" style="padding-top:10px;">
	<h1 class="hidden-xs top_title"><?php echo $product->name; ?></h1>

	<div class="row" style="margin-bottom:40px;">
		<div class="col-sm-7  ">
			<div class="productFrame">
				<span class="priceshow"><?php echo '$' . number_format($product->price, 2, '.', ''); ?></span>
				<img src="/images/tag-btm.png" width="13" height="8" class="btm-s">
				<a data-toggle="modal" data-target="#imageModal" data-theimage="<?php echo $product->imageUrl; ?>">
					<img src="<?php echo $product->imageUrl; ?>" alt="Science T-Shirt" width="651" height="651" class="img-responsive lg_view">
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="explain hidden-xs">
				<p><strong>Design Description:</strong></p>
				<p><?php echo $product->description; ?></p>
			</div>

		</div>
		<div class="col-sm-5  col-lg-4 col-lg-offset-1">
			<div class="hidden-xs" style="min-height:85px">
				<a href="<?php echo $product->original_url . $setting_id?>" type="button" name="submit" class="btn btn-lg btn-block btn-xxl btn-success btn-bright  hidden-xs">Add To Cart &nbsp;&nbsp;<i class="fa fa-caret-right"></i></a>
			</div>
			<div class="clearfix"></div>
			<div class="hidden-xs">
				<div class="clearfix"></div>

				<img src="/images/payment-options.jpg" width="368" height="41" alt="Visa MasterCard American Express Paypal" class="img-responsive center-block">

				<br>
				<br>

				<div class="alt-bg alt-bg-pad">

					<div class="col-xs-6 visible-xs">
						<a href="http://www.sunfrogshirts.com/returns/">
							<img src="/images/satisfaction.svg" width="296" height="66" alt="100% Satisfaction Guaranteed!" class="img-responsive cen-sm">
						</a>
					</div>

					<div class="col-xs-6 visible-xs">
						<img src="/images/printed-in-us.svg" width="209" height="66" alt="Printed in the USA" class="img-responsive cen-sm">
					</div>

					<div class="hidden-xs">
						<a href="" class="">
							<img src="/images/satisfaction.svg" width="296" height="66" alt="100% Satisfaction Guaranteed!" class="img-responsive cen-sm">
						</a>
					</div>

				</div>


				<div class="hidden-xs">
					<center>

						<div class="print-us">
							<img src="/images/printed-in-the-us.png" width="34" height="32" alt="Printed in the USA" class="img-responsive pull-left">
							<h4 style="color:#b9b9b9">Printed in the USA!</h4>
						</div>

						<br>
						<br>
					</center>
				</div>
			</div>

			<br>
			<div class="alt-bg alt-bg-pad visible-xs">

				<div class="col-xs-6">
					<a href="http://www.sunfrogshirts.com/returns/">
						<img src="./Science T-Shirt_files/satisfaction.svg" width="296" height="66" alt="100% Satisfaction Guaranteed!" class="img-responsive cen-sm">
					</a>
				</div>

				<div class="col-xs-6">
					<img src="/images/printed-in-us.svg" width="209" height="66" alt="Printed in the USA" class="img-responsive cen-sm">
				</div>

				<div class="clearfix"></div>
			</div>
			<br>
		</div>
	</div>
</div>
<h4>You might also like</h4>
<div class="row" style="  box-shadow: 0 0 5px #ccc;border: 5px solid #fff;">
		<?php foreach ($related_products as $prod) { ?>
					<div class="col-md-2" style="float: left; list-style: none; position: relative;padding-left:0px;">
								<div>
									<a href="<?php echo '/detail/'. $prod->id; ?>" border="0" title="<?php echo $prod->name; ?>">
										<img src="<?php echo $prod->imageUrl; ?>" width="200" height="180" alt="">
									</a>
								</div>
							</div>
		<?php } ?>
</div>
<br/><br/><br/>
