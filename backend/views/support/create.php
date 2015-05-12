<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Support', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create" style="padding-top: 10px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
