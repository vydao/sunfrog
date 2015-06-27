<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Config;
use common\models\Logo;
use common\models\Category;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = 'SunFrogShirts';
AppAsset::register($this);
$categories = Category::find()->select('id, name')->orderBy('priority ASC')->all();
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
<?php $this->beginBody() ?>
    <nav class="navbar navbar-default shellOff" id="MainNav">

      <div class="container go-wide" style="position: relative;">
        <div class="row shellOff">
         <div class="col-sm-3 col-md-2 logocase">
            <a href="/">
                <img src="/images/SunFrogShirts-Logo1.svg" alt="SunFrog Shirts Logo" class="top-logo">
            </a>
        </div>

        <script>
            function plsWaitSearch(a){
                $('#plsWaitSearchBtn').attr("disabled", true);
                return true;
            };
        </script>

        <div class="col-sm-4 col-md-6 searchbarTopNav cart-checkoutHide">
            <form action="http://www.sunfrogshirts.com/search/" method="get" onsubmit="return plsWaitSearch();">

                <input id="byCatSelect" type="hidden" name="cId" value="0">
                <input id="byCatName" type="hidden" name="cName" value="">
                <div class="input-group">
                    <div class="input-group-btn search-panel">

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-right: -2px;">

                            All

                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="http://www.sunfrogshirts.com/#">All</a></li>
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
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach ($categories as $cate) { ?>
                                <li><a href="<?php echo Yii::$app->request->baseUrl . '/category/' . $cate->id; ?>"><?php echo $cate->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="http://www.sunfrogshirts.com/Contact/">Help</a></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

</nav>
<?php if ( $this->context->is_home_page ) { ?>
<div class="shellOff">
    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="jumbotron sp-bg-wrap text-center firstslide">
                    <div class="container" style="padding-left: 52px; padding-right: 52px; padding-top:15px;">
                        <form action="http://www.sunfrogshirts.com/search/" method="get">
                            <input id="byCatSelect" type="hidden" name="cId" value="0">
                            <input id="byCatName" type="hidden" name="cName" value="">

                            <div class="col-md-4 text-center">
                                <h1>You are&nbsp;</h1>
                            </div>
                            <div class="hidden-xs"><br><br></div>
                            <div class="input-group input-group-lg col-md-6">

                                <input type="text" class="form-control" name="search" placeholder="what you wear!">
                                <span class="input-group-btn">
                                    <button type="submit" name="submit" class="btn btn-primary">Go!</button>
                                </span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="jumbotron sp-bg-wrap fourthslide">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
                                <img src="/images/catdayword.png" class="img-responsive center-block" alt="Happy Cats Day!">
                                <br>
                                <a href="http://www.sunfrogshirts.com/search/?cId=0&cName=&search=cats" class="btn btn-lg btn-primary">Click Here! <i class="fa fa-caret-right"></i></a>
                            </div>
                            <div class="col-sm-6 hidden-xs">
                                <img src="/images/catdayshirt.png" class="img-responsive pull-right" alt="Cat Day Shirt">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="jumbotron sp-bg-wrap secondslide">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <br class="hidden-xs">
                                <img src="/images/getfatherword.png" class="img-responsive center-block custom-size" alt="Happy Fathers Day!">
                                <br>
                                <a href="http://www.sunfrogshirts.com/search/?cId=0&cName=&search=fathers" class="btn btn-lg btn-default">Click Here! <i class="fa fa-caret-right"></i></a>
                            </div>
                            <div class="col-sm-6 hidden-xs">
                                <img src="/images/fatethersdayshirt.png" class="img-responsive pull-right" alt="Fathers Day Shirt">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="jumbotron sp-bg-wrap thirdslide">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <br><br><br class="hidden-xs">
                                <img src="/images/know-a-nurse.png" class="img-responsive center-block" alt="Know A Nurse?">
                                <br>
                                <a href="http://www.sunfrogshirts.com/search/?search=nurses&cId=0&cName=" class="btn btn-lg btn-primary">Click Here! <i class="fa fa-caret-right"></i></a>
                            </div>
                            <div class="col-sm-6 hidden-xs">
                                <img src="/images/nurse-shirt.png" class="img-responsive pull-right" alt="Nurses Shirt">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="http://www.sunfrogshirts.com/#carousel1" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="http://www.sunfrogshirts.com/#carousel1" role="button" data-slide="next">
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
                <a href="http://www.sunfrogshirts.com/Fanbuild/" title="New Designs from Fanbuild"><img src="/images/fanbuild-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="Fanbuild on SunFrog"></a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/CrookedMonkey/" title="New Designs from Crooked Monkey"><img src="/images/crooked-monkey-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="Crooked Monkey On SunFrog"></a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/bt/" title="New Designs from Busted Tees"><img src="/images/busted-tees-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="Busted Tees on SunFrog"></a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="http://www.sunfrogshirts.com/snorgtees/" title="New Designs from Snorg Tees"><img src="/images/snorgtees-on-sunfrog.jpg" class="img-responsive pull-left thumbnail " alt="SnorgTees on SunFrog"></a>
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
            <a href="http://www.sunfrogshirts.com/returns/">
                <img src="/images/satisfaction-lg.svg" class="img-responsive center-block" alt="Satisfaction Guranteed">
            </a>
            <p>If you don't absolutely love your print, we'll take it back! </p>

        </div>
    </div>
</div>
<?php } ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63977646-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="footer" class="shellOff">
    <div class="darkbg shellOff">
        <div class="container" style="padding-top:1.5em;">
            <div class="col-sm-offset-0 col-sm-6 col-sm-push-6">
                <a href="https://www.facebook.com/SunFrogShirts" target="new" class="socialIcon facebook"></a>
                <a href="mailto:info@sunfrogshirts.com" target="new" class="socialIcon email"></a>
                <a href="https://instagram.com/sunfrogshirts" target="new" class="socialIcon instagram"></a>
                <a href="https://pinterest.com/SunFrogShirts/" target="new" class="socialIcon pinterest"></a>
                <a href="http://www.stumbleupon.com/stumbler/SunfrogShirts" target="new" class="socialIcon stumble"></a>
                <a href="https://www.twitter.com/SunFrogShirts" target="new" class="socialIcon twitter"></a>
                <div class="clearfix"></div>
                <br><br>
            </div>
            <div class="col-sm-6 col-sm-pull-6">
                <div class="col-sm-6">
                    <h4>General</h4>
                    <a href="http://www.sunfrogshirts.com/Tracking/">Order Tracking</a><br>
                    <a href="http://www.sunfrogshirts.com/Contact/">FAQ/Help</a><br>
                    <a href="http://www.sunfrogshirts.com/size/">Sizing</a><br><br>
                    <h4>Legal</h4>
                    <a href="http://www.sunfrogshirts.com/terms/">Terms</a><br>
                    <a href="http://www.sunfrogshirts.com/copyright/">Copyright</a><br>
                    <a href="http://www.sunfrogshirts.com/terms/privacy-policy.cfm">Privacy Policy</a><br><br>
                </div>

                <div class="col-sm-6">
                    <h4>Our Team</h4>
                    <a href="https://manager.sunfrogshirts.com/">My Account</a><br>
                    <a href="https://manager.sunfrogshirts.com/artist-signup.cfm">Artist Signup</a><br>
                    <a href="http://www.sunfrogshirts.com/Affiliates/">Affiliate Signup</a><br>
                    <a href="http://www.sunfrogshirts.com/Affiliates/why-use-sunfrog.cfm">Why Use SunFrog?</a><br>
                    <a href="http://www.sunfrogshirts.com/Affiliates/sunfrog-success.cfm">SunFrog Success</a><br><br>
                </div>

                <div class="col-sm-6 ">
                    <h4>More</h4>
                    <a href="http://www.sunfrogshirts.com/Wholesale/">Custom WholeSale</a><br>
                    <a href="http://www.sunfrogshirts.com/Marketing/">Marketing</a><br>
                    <a href="http://www.sunfrogshirts.com/Jobs.cfm">Jobs</a><br><br>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
        </div>
    </div>

    <div class="shellOff" style="padding-top:1em; background:#161616;">
        <div class="container">
            <p class="text-muted small">© COPYRIGHT SUNFROGSHIRTS.COM 2015</p>
        </div>
    </div>

</div>

<script>
    // ie10 viewport bug workaround
    (function () {
      'use strict';
      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
          document.createTextNode(
            '@-ms-viewport{width:auto!important}'
            )
          )
        document.querySelector('head').appendChild(msViewportStyle)
    }
})();
</script>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
