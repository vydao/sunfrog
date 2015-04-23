<div class="news-content">
	<p>Created : <?= date('d M Y H:i', $model->created_date);?></p>
	<h4><?= $model->title;?></h4>
	<div class="news-content">
		<?= $model->content;?>
	</div>
</div>