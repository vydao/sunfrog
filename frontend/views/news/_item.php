<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to(['news/view', 'id'=>$model->id]);
?>
<div class="news-item">
	<p class="date"><?=date('M d Y', $model->created_date);?></p>
	<h4><a href="<?=$url;?>"><?=$model->title;?> </a></h4>
	<div class="new-brief">
	<?php
		echo substr(strip_tags($model->content),0,300) . '... <a class="read-more" href="'.$url.'">read more>></a>';?>
	</div>
	<hr>
</div>