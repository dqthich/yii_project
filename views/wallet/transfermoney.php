<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
$walletList =ArrayHelper::map($wallet,'wallet_id','description');
$this->title = 'Transfer money';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Yii::$app->session->getFlash('success'); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <?php foreach($wallet as $wallet ) : ?>
        <?php endforeach;?>
        <p>Select wallet need transfered</p>
        <?= $form->field($wallet, 'description')->dropdownList(
                            $walletList,['prompt'=>'Select wallet']) ?>
        <p>Type amount to transfer</p>
        <?= $form->field($wallet, 'balance') ?> 
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Enter', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>          
        </div>
    <?php ActiveForm::end(); ?>
      
</div>
