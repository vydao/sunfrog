<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Config;
use common\models\Logo;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$url = Yii::$app->params['_url'];

//Default load
$footer = Config::find()->select('content')->where('com="footer"')->one();
$video = Config::find()->select('content')->where('com="video"')->one();

$banner = Logo::find()->select('photo, name')->where('com="logo"')->one();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="9Iuq8N4OXTU67CwDfYFFTqos0bX2e5ULCh8mUQyaUCQ" />
    
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
                <a href="<?php echo $url; ?>home"><img src="<?php echo $banner->imageUrl(); ?>" alt="<?php echo $banner->name; ?>" width="250" height="90" border="0" /></a>
            </div>
            <div id='right_banner'>
                <ul id='nav_header'>
                    <li><a href="<?php echo $url; ?>home">Home</a></li>
                    <li><a href="<?php echo $url; ?>about">About Us</a></li>
                    <li><a href="<?php echo $url; ?>news">News &amp; Event</a></li>
                    <li><a href="<?php echo $url; ?>support">Support</a></li>
                    <li><a href="<?php echo $url; ?>contact">Contact Us</a></li>
                </ul>
                <div id='search_header'>
                    <form action="/home" method="get">
                        <input type="text" name="SEARCH" placeholder="Search ..." />
                        <input type="submit" value="Search" />
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
                                <li><a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['category/' . $cate->id]); ?>"><?php echo $cate->name; ?></a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>

                <h2 style="margin-top:15px;"><i class="fa fa-video-camera"></i>Video Clip</h2>
                <div id='video_left'>
                	<?php echo $video->content; ?>
                </div>

                <h2 style="margin-top:15px;"><i class="fa fa-send"></i>Hot News</h2>
                <div class="left_info">
                	<ul class="news_nav">
                    	<?=Yii::$app->params['top_news']?>
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
                    <li><a href="<?php echo $url; ?>news">News &amp; Event</a></li>
					<li><a href="<?php echo $url; ?>support">Support</a></li>
                    <li><a href="<?php echo $url; ?>contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="col_footer">
            	<h2>SUPPORT</h2>
            	<ul class="nav_footer">
                    <?=Yii::$app->params['top_supports']?>
                </ul>
            </div>
            <div class="col_right_footer">
            	<h2>CONTACT US</h2>
            	<div class="content_footer">
                	<?php echo $footer->content; ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>    

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-63977646-1', 'auto');
      ga('send', 'pageview');

    </script>

    <?php $this->endBody() ?>    
</body>
</html>
<?php $this->endPage() ?>
