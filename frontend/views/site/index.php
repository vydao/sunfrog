<?php if( $search === false ) : ?>
<h4 class="text-primary text-uppercase" style="padding-top:1em;">What's Hot</h4>
<?php elseif( !empty($search_text) ) : ?>
<h4>Search results for: "<?php echo $search_text;?>"</h4>
<div class="clearfix"></div>
<?php endif;?>
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
									<img src="'. $product->imageUrl .'" data-original="'. $product->imageUrl .'" class="img-responsive lazy" alt="'. $product->name .'" title="'. $product->name .'" style="display: block;">
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
} else if( $search === true ){ 
	echo '<div class="clearfix"></div>
	<h1 class="text-center">Sorry... </h1>
	<h3 class="text-center">Your search did not return any results. You maybe interested in our new products!</h3>
	<br><br>';
} ?>
