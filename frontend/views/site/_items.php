<?php
use yii\widgets\LinkPager;
?>
<article class="content">
    <?php if(!empty($products)){
            $i = 0;
    ?>
      <?php foreach($products as $key => $product){
              $i++;
      ?>
        <div class="product_info">
            <a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['detail/' . $product->id]) ?>" class="product_img">
            <img src="<?php echo Yii::$app->request->baseUrl . "/uploads/products/{$product->image}"; ?>" border="0" /></a>
            <h2><a href="" class="product_name"><?php echo $product->name; ?></a></h2>
            <h3 class="product_price">$<?php echo (!empty($product->price)) ? number_format($product->price,2) : 0 ?></h3>
        </div>
        <?php if(4 == $i){
                $i = 0;
        ?>
                <div class="product_space"></div>
        <?php } ?>
      <?php } ?>
      <?php }else{ echo "<h1>Coming soon.</h1>"; } ?>
    <div class="clear"></div>
    <?php if(!empty($pages)){
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
    } ?>
</article>
