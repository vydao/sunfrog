<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to(['/support']);
$url .= '/' . urlencode($model->title . '-' . $model->id);
?>

<div class="news-item">
	<?php if( !empty($model->image) ) : ?>
	<div class="news-image">
		<a href="<?=$url;?>">
			<img alt="" src="<?= $model->imageUrl();?>">
		</a>		
	</div>
	<div class="news-description">		
		<h3><a href="<?=$url;?>"><?=$model->title;?> </a></h3>
		<p class="date"><?=date('M d Y H:i A', $model->created_date);?></p>
		<div class="news-brief text">
		<?php
			echo substr(strip_tags($model->description),0,250) . '... <a class="read-more" href="'.$url.'">read more>></a>';?>
		</div>
	</div>
	<?php else : ?>
	<div class="news-description" style="width: 100%;">		
		<h3><a href="<?=$url;?>"><?=$model->title;?> </a></h3>
		<p class="date"><?=date('M d Y H:i A', $model->created_date);?></p>
		<div class="news-brief text">
		<?php
			echo substr(strip_tags($model->description),0,250) . '... <a class="read-more" href="'.$url.'">read more>></a>';?>
		</div>
	</div>
	<?php endif;?>
	<hr>
</div>