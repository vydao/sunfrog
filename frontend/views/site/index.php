<h4 class="text-primary text-uppercase" style="padding-top:1em;">What's Hot</h4>
<?php if (!empty($products)) {
		$i = 0;
		$new_row = true;
		foreach ($products as $key => $product) {
			if ($new_row == true) {
				echo '<div class="row">';
				$new_row = false;
			}
			echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="frameitWrapper">
						<div class="price">
							<strong>$' . number_format($product->price, 2) . '</strong>
							<img src="/images/leftpsm.png" class="leftp">
						</div>
						<div class="frameit">
							<a href="/detail/'. $product->id .'" border="0">
								<div class="frontThumb">
									<img src="/uploads/products/'. $product->image .'" data-original="/uploads/products/'. $product->image .'" class="img-responsive lazy" alt="'. $product->image .'" title="'. $product->image .'" style="display: block;">
								</div>
							</a>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<strong style="font-size:12px;" class="text-info">'. $product->name .'</strong>
							</div>
						</div>
					</div>
				</div>';
			$i++;

			if ($i == 4) {
				echo '</div>';
				$new_row = true;
				$i = 0;
			}
		}
} ?>
