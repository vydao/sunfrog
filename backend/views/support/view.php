<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view" style="padding-top:10px;">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title:ntext',
    		[
	            'label'=>'Created Date',
            	'value'=>date('d M Y H:i A', $model->created_date)
            ],
    		[
	            'label'=>'Updated Date',
            	'value'=>date('d M Y H:i A', $model->updated_date)
            ]            
        ],
    ]) ?>
    
    <div class="news-content">
		<h2 class="sapo"><?= $model->description?></h2>
		<?php if( !empty($model->image) ) : ?>
		<div class="news-content-image">
			<img alt="<?= $model->title;?>" title="<?= $model->title;?>" src="<?= $model->imageUrl() ?>">
		</div>
		<?php endif;?>
		<div class="news-content">
			<?= $model->content ?>
		</div>
	</div>

</div>
