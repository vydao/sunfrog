<?php
/* @var $this yii\web\View */

$this->title = 'Sunfrog Shirt';
?>
<h1><?php echo $category->name . ' Shirts'; ?></h1>
<hr>
<?php echo $this->render('_items', ['products' => $products, 'pages' => $pages]); ?>

