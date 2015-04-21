<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
</head>
<body>
    <?php $this->beginBody() ?>
        <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sunfrog Admin</a>
            </div>
            <!-- /.navbar-header -->
             <ul class="nav navbar-top-links navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['site/logout']); ?>">Logout</a></li>
              </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['products']); ?>"><i class="fa fa-dashboard fa-fw"></i> Products</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['categories']); ?>"><i class="fa fa-table fa-fw"></i> Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['news']); ?>"><i class="fa fa-edit fa-fw"></i> News</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['settings']); ?>"><i class="fa fa-edit fa-fw"></i> Settings</a>
                        </li>
                    </ul>
               </div>
                <!-- /.sidebar-collapse -->
           </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
             <?= $content ?>
   </div>
    </div>
<?php $this->endBody() ?>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/js/tinymce/tinymce.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>
