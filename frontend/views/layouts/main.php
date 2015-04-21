<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$url = Yii::$app->params['_url'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="<?php echo $url; ?>js/jquery-1.7.2.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo $url; ?>js/html5.js"></script>
    <![endif]-->
</head>
<body>
    <?php $this->beginBody() ?>
        
    <header>
    	<div class="container">
            <div id='banner'>
                <a href="<?php echo $url; ?>home"><img src="<?php echo $url; ?>photos/logo.png" alt="Insert Logo Here" width="250" height="90" border="0" /></a>
            </div>    
            <div id='right_banner'>
                <ul id='nav_header'>
                    <li><a href="<?php echo $url; ?>home">Home</a></li>
                    <li><a href="<?php echo $url; ?>about">About Us</a></li>
                    <li><a href="<?php echo $url; ?>">News &amp; Event</a></li>
                    <li><a href="<?php echo $url; ?>">Support</a></li>
                    <li><a href="<?php echo $url; ?>contact">Contact Us</a></li>
                </ul>
                <div id='search_header'>
                    <form action="" method="post">
                        <input type="text" name="Search[name]" placeholder="Search ..." />
                        <input type="submit" name="Search[btnSend]" value="Search" />
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
    	</div>
    </header>
    
    <div class="container">
    	<div class="wrapper">                    	          
            <div class="sidebar_left">
            	<h2><i class="fa fa-list-ul"></i>Categories</h2>
                <ul class="nav_bar">
                    <?php if(!empty(Yii::$app->params['left_menu'])){ ?>
                        <?php foreach(Yii::$app->params['left_menu'] as $cate){ ?>
                                <li><a href="#"><?php echo $cate->name; ?></a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                
                <h2 style="margin-top:15px;"><i class="fa fa-video-camera"></i>Video Clip</h2>
                <div id='video_left'>
                	<iframe width="100%" height="200" src="https://www.youtube.com/embed/NTFTXfXqfp4" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <h2 style="margin-top:15px;"><i class="fa fa-send"></i>Hot News</h2>
                <div class="left_info">
                	<ul class="news_nav">
                    	<li><i class="fa fa-edit"></i><a href="">How much are hoodies?</a></li>
                        <li><i class="fa fa-edit"></i><a href="">How much are t-shirts?</a></li>
                        <li><i class="fa fa-edit"></i><a href="">How much does it cost?</a></li>
                        <li><i class="fa fa-edit"></i><a href="">You charged me more!</a></li>
                        <li><i class="fa fa-edit"></i><a href="">You made a mistake on my order.</a></li>
                        <li><i class="fa fa-edit"></i><a href="">(Tin tức nổi bật ở đây)</a></li>
                    </ul>
                </div>       
            </div>
            
            <section class="main_content">
                <?= $content ?>                
            </section>
            
            <div class="clear"></div>                         
        </div>  	
    </div>
    
    <footer>
    	<div class="container">
        	<div class="col_footer">
            	<h2>GENERAL</h2>
            	<ul class="nav_footer">                    
                    <li><a href="<?php echo $url; ?>home">Home</a></li>
                    <li><a href="<?php echo $url; ?>about">About Us</a></li>
                    <li><a href="">News &amp; Event</a></li>
                    <li><a href="<?php echo $url; ?>contact">Contact Us</a></li>
                </ul>
            </div> 
            <div class="col_footer">
            	<h2>SUPPORT</h2>
            	<ul class="nav_footer">
                    <li><a href="">How to use?</a></li>
                    <li><a href="">How to buy?</a></li>
                    <li><a href="">How to payment?</a></li>
                    <li><a href="">(Các bài hỗ trợ nổi bật)</a></li>
                </ul>
            </div>
            <div class="col_right_footer">
            	<h2>CONTACT US</h2>
            	<div class="content_footer">
                	<p>We enjoy helping groups, individuals, business, non-profits, or anyone looking to make their event, business, or fund-raiser more profitable.</p>                
                	<p>SunFrog wholeale offers a complete apparel product line and a wide variety of color choices. Get started by contacting a sales representative of SunFrog today.</p>
                    <p>(Chỗ này là 1 bài mô tả ngắn gọn về website hoặc gì cũng được)</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
