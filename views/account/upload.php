<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Upload avatar';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please select image to upload:</p>
    <?= Yii::$app->session->getFlash('success'); ?>
    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'],
       // 'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($account, 'avatar')->fileInput() ?>    
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Upload', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>      
            </div>
           
        </div>

    <?php ActiveForm::end(); ?>

   
</div>
