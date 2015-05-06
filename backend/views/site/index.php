<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Wellcome to Administrator</h1>

        <p class="lead">If you want visit website, please click to link follow:</p>

        <p><a class="btn btn-lg btn-success" href="http://<?=Yii::$app->params['_website']?>" target="_blank">Visit website</a></p>
    </div>
    
</div>
