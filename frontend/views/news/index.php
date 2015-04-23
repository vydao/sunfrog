<?php
use yii\widgets\ListView;
$this->params['breadcrumbs'][] = $this->title;
?>
<article class="content">
	<h1 class="main_ttt"><i class="fa fa-newspaper-o"></i> News</h1>
    
    <div class="content_main">
        <?=ListView::widget( [
			    'dataProvider' => $dataProvider,
			    'itemView' => '_item',
			] ); 
		?>
        <div class="clear"></div>
    </div>    
</article>