<?php 
$this->title = $model->title;
if(!empty($model->meta_keyword)) {
	$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keyword]);
}
if(!empty($model->meta_description)) {
	$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
}
if(!empty($model->meta_title)) {
	$this->registerMetaTag(['name' => 'title', 'content' => $model->meta_title]);
}
    	
?>
<div class="news-content">
	<h1><?= $model->title ?></h1>
	<h2 class="sapo"><?= $model->description?></h2>
	<?php 
	$img_url = $model->imageUrl();
	if( !empty($img_url) ) : ?>
	<div class="news-content-image">
		<img alt="<?= $model->title;?>" title="<?= $model->title;?>" src="<?= $img_url ?>">
	</div>
	<?php endif;?>
	<div class="news-content">
		<?= $model->content ?>
	</div>
</div>