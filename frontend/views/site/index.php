<?php
/* @var $this yii\web\View */

$this->title = 'Sunfrog Shirt';

$url = Yii::$app->params['_url'];
?>
<aside id='slideshow'>
   	<img src="<?php echo $slider->imageUrl(); ?>" alt="<?php echo $slider->name; ?>" border="0" />
    <div class="clear"></div>
</aside>

<?php echo $this->render('_items', ['products' => $products]); ?>

