<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About Us';

$this->title = 'About Us' . (($data->title != '') ? $data->title : '');
if(isset($seo['keyword'])) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $data->keyword]);            
}
if(isset($seo['description'])) {
    $this->registerMetaTag(['name' => 'description', 'content' => $data->description]);
}

$this->params['breadcrumbs'][] = $this->title;
?>
<article class="content">
	<h1 class="main_ttt"><i class="fa fa-external-link"></i> About Us</h1>
    
    <div class="content_main">
        <?php echo $data->content; ?>
        <div class="clear"></div>
    </div>    
</article>