<?php
/* @var $this yii\web\View */

$this->title = 'Sunfrog Shirt';

$url = Yii::$app->params['_url'];
?>
<aside id='slideshow'>
   	<a href=""><img src="<?php echo $url; ?>photos/slide.jpg" border="0" /></a>
    <div class="clear"></div>
</aside>

<?php echo $this->render('_items', ['products' => $products]); ?>

