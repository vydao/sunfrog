<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Config;
use common\models\Logo;
use common\models\Slider;
use common\models\Category;
use common\models\Setting;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = 'SunFrogShirts';
AppAsset::register($this);
$categories = Category::find()->select('id, name')->orderBy('priority ASC, name')->all();
$setting_id = Setting::find()->select('name,value')->where('active = 1')->one();
$logo = Logo::find()->orderBy('id')->one();
if( $logo === null )
{
	$logo = new Logo();
}
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="9Iuq8N4OXTU67CwDfYFFTqos0bX2e5ULCh8mUQyaUCQ" />
    <meta name="Keywords" content="sunfrog, sun frog, shirts, t-shirts, funny t-shirts, funny shirts, t-shirt, tshirts, crazy t-shirts, tee shirts, offensive t-shirts, politically incorrect t-shirts, cool shirts, tshirt, tee-shirts, tee-shirt">
    <meta name="Description" content="Welcome to SunFrog! Shop t-shirts. Choose from over 2,000,000 unique tees. Sunfrog has a large selection of shirt styles. Satisfaction guaranteed.">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="apple-touch-icon" href="http://www.sunfrogshirts.com/Images/SunFrog-Square-Logo.svg">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52135093-6', 'auto');
  ga('send', 'pageview');

</script>

<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(['addPixelId', '1447649788872392']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1447649788872392&amp;ev=PixelInitialized" /></noscript>
<?php $this->beginBody() ?>
    <nav class="navbar navbar-default shellOff" id="MainNav">

      <div class="container go-wide" style="position: relative;">
        <div class="row shellOff">
         <div class="col-sm-3 col-md-2 logocase">
            <a href="/">
                <img src="<?php echo $logo->imageUrl()?>" alt="SunFrog Shirts Logo" class="top-logo">
            </a>
        </div>

        <script>
            function plsWaitSearch(a){
                $('#plsWaitSearchBtn').attr("disabled", true);
                return true;
            };
        </script>

        <div class="col-sm-4 col-md-6 searchbarTopNav cart-checkoutHide">
            <form action="<?php echo Yii::$app->params['site_url']?>search" method="get" onsubmit="return plsWaitSearch();">
				<?php 
                	$session = Yii::$app->session;
                	$cate_stored = $session['category'] ? $session['category'] : false;
                	if( $cate_stored )
                	{
                		$cate_name_stored = $cate_stored['name'];
                		$cate_id_stored = $cate_stored['id'];
                	} else {
                		$cate_name_stored = 'All';
                		$cate_id_stored = 0;
                	}
                ?>
                <input id="byCatSelect" type="hidden" name="cId" value="<?php echo $cate_id_stored;?>">
                <input id="byCatName" type="hidden" name="cName" value="<?php echo $cate_id_stored ? $cate_name_stored : '';?>">
                <div class="input-group">
                    <div class="input-group-btn search-panel">

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-right: -2px;">
							<?php echo $cate_name_stored;?>
							<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="max-height: 500px;overflow-y: auto;">
                            <li><a href="<?php echo Yii::$app->params['site_url'];?>">All</a></li>
                            
                            <?php foreach ($categories as $cate) { ?>
                                <li><a href="<?php echo Yii::$app->request->baseUrl . '/category/' . $cate->id; ?>"><?php echo $cate->name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <input type="text" class="form-control" name="search" placeholder="Search over 2 million designs">


                    <span class="input-group-btn">
                        <button id="plsWaitSearchBtn" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>

                </div>
            </form>
        </div>

        <div class="col-sm-4 hidden-xs cart-checkoutHide">
            <ul class="nav navbar-nav ">
                <li class="dropdown"><a href="#" class="dropdown-toggle text-uppercase tpnav" data-toggle="dropdown" role="button" aria-expanded="false"><strong>Categories</strong> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" style="max-height: 500px;overflow-y: auto;">
                        <?php foreach ($categories as $cate) { ?>
                                <li><a href="<?php echo Yii::$app->request->baseUrl . '/category/' . $cate->id; ?>"><?php echo $cate->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="http://www.sunfrogshirts.com/Contact<?php echo !empty($setting_id) ? '?'.$setting_id->name : ''?>">Help</a></li>
            </ul>
            <a href="#">
                <img src="<?php echo $logo->imageUrl()?>" alt="SunFrog Shirts Logo" class="top-logo">
            </a>
            </div>
    </div>
    <div class="clearfix"></div>
</div>

</nav>
<?php if ( $this->context->is_home_page && !empty( $this->context->slider )) { ?>
<div class="shellOff">
   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
  <?php foreach( $this->context->slider as $key => $slider ) { ?>
    <div class="item <?php if ($key == 0) echo 'active' ?>">
    <a href="<?php echo $slider->link;?>">
     	<img src="/uploads/logo/<?php echo $slider->photo; ?>" alt="<?php echo $slider->name; ?>">
     </a>
      <div class="carousel-caption">
                            </div>
                            </div>
    <?php } ?>
        </div>

        <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="darkbg">
    <div class="container">
        <h4 class="text-primary text-uppercase">Hot Artists</h4>

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/Fanbuild<?php echo !empty($setting_id) ? '?'.$setting_id->name : ''?>" title="New Designs from Fanbuild"><img src="/images/fanbuild-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="Fanbuild on SunFrog"></a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/CrookedMonkey<?php echo !empty($setting_id) ? '?'.$setting_id->name : ''?>" title="New Designs from Crooked Monkey"><img src="/images/crooked-monkey-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="Crooked Monkey On SunFrog"></a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/bt<?php echo !empty($setting_id) ? '?'.$setting_id->name : ''?>" title="New Designs from Busted Tees"><img src="/images/busted-tees-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="Busted Tees on SunFrog"></a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/snorgtees<?php echo !empty($setting_id) ? '?'.$setting_id->name : ''?>" title="New Designs from Snorg Tees"><img src="/images/snorgtees-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="SnorgTees on SunFrog"></a>
            </div>
            <div class="clearfix"></div>
            <br>
        </div>

    </div>
</div>
<?php } ?>

<div class="container">
    <?= $content ?>
</div>


<?php if ( $this->context->is_home_page ) { ?>
<div class="lightbg">
    <div class="container" style="padding:1em 0em;">
        <div class="text-center">
            <a href="http://www.sunfrogshirts.com/returns<?php echo !empty($setting_id) ? '?'.$setting_id->name : ''?>">
                <img src="/images/satisfaction-lg.svg" class="img-responsive center-block" alt="Satisfaction Guranteed">
            </a>
            <p>If you don't absolutely love your print, we'll take it back! </p>

        </div>
    </div>
</div>
<?php } ?>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
