<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Edit category';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Yii::$app->session->getFlash('success'); ?>
    <?php foreach($edit as $editt ) : ?>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
      //  'action'=>'save',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($editt, 'category_name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($editt, 'type')?>
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Save',['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
           
        </div>

    <?php ActiveForm::end(); ?>
    <?php endforeach;?>
   
</div>
