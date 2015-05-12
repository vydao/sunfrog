<?php
use yii\widgets\ListView;
$this->params['breadcrumbs'][] = $this->title;
$this->title = 'Support';
?>
<article class="content">
	<h1 class="main_ttt"><i class="fa fa-newspaper-o"></i> Support</h1>
    
    <div class="content_main home-list">
	    <ul>
	        <?=ListView::widget( [
				    'dataProvider' => $dataProvider,
				    'itemView' => '_item',
				] ); 
			?>
		</ul>
        <div class="clear"></div>
    </div>    
</article>