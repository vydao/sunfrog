<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="main_ttt"><i class="fa fa-external-link"></i> Contact Us</h1>
    
    <div class="content_main">
        <?php echo $data->content; ?>
        <div class="clear"></div>
    </div>       

    <div style="max-width: 550px; padding: 0px 20px; margin: 0px auto;">
        <div class="col-lg-12">
            <h3 style="font-size: 14px; margin-bottom: 10px; text-align: center; font-weight: bold;">
                If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
            </h3>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>        
    </div>

</div>
