<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
$cateList =ArrayHelper::map($cate,'category_id','category_name');
$walletList =ArrayHelper::map($wallet,'wallet_id','description');
$this->title = 'Edit Transaction';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Yii::$app->session->getFlash('success'); ?>
    <?php foreach($trans as $trans ) : ?>
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
        <?= $form->field($trans, 'category_id')->dropdownList(
                            $cateList,['prompt'=>'Select category']) ?>
        <?= $form->field($trans, 'payment')->textInput(['autofocus' => true]) ?>
        <?= $form->field($trans, 'wallet_id')->dropdownList(
                            $walletList,['prompt'=>'Select wallet']) ?>
        <?= $form->field($trans, 'date')->input('date') ?>
       
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
           
        </div>

    <?php ActiveForm::end(); ?>
    <?php endforeach;?>
   
</div>
