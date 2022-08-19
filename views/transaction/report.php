<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>

<h1>Monthly report</h1>
<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'action'=>'monthreport',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($trans, 'category_name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($tran, 'date')->input('month') ?>
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>      
        </div>
<?php ActiveForm::end(); ?>
<?php echo Html::a('Back', ['transaction/index'], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
<?php if ($object) : $n = 1; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category name</th>
                <th scope="col">Type</th>
                <th scope="col">Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalincome = 0;
            $totalexpanse = 0; ?>
            <?php foreach ($object as $key => $item) : ?>
                <tr>
                    <th scope="row"><?php echo $n; ?></th>
                    <td><?php echo $item['category_name']; ?></td>
                    <td><?php
                        if ($item['type'] == 1) {
                            echo "expanse";
                        } else {
                            echo "income";
                        }
                        ?></td>
                    <td><?php echo number_format($item['payment']) . " VND"; ?><i class="fa fa-facebook" aria-hidden="true"></i></td>
                </tr>
                <?php
                if ($item['type'] == 0) {
                    $totalincome += $item['payment'];
                } else {
                    $totalexpanse += $item['payment'];
                }
                ?>
            <?php $n++;
            endforeach; ?>
        </tbody>
    </table>
    <p>Total income: <?php
                        echo number_format($totalincome) . " VND";
                        ?></p>
    <p>Total expanse: <?php
                        echo number_format($totalexpanse) . " VND";
                        ?></p>
    <p> <?php
        if ($totalincome > $totalexpanse) {
            echo 'Total amount: +', number_format($totalincome - $totalexpanse) . " VND";
        } else {
            echo 'Total amount: -', number_format($totalexpanse - $totalincome) . " VND";
        }

        ?></p>
<?php endif; ?>