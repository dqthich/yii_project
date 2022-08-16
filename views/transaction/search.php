<?php 
use yii\helpers\Html; 
use yii\bootstrap4\ActiveForm;
?>

<h1>List transaction</h1>
<!-- <form class="form-inline my-2 my-lg-0" action="Search.php" method="post">
      <input class="form-control mr-sm-2" type="search" name= "search" id= "search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="btn_tk"  id="btn_tk" type="submit">Search</button>
</form> -->
<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'action'=>'search',
        'class'=>'form-inline my-2 my-lg-0',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($trans, 'category_name')->textInput(['autofocus' => true,'class'=>'form-control mr-sm-2']) ?> 
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Search', ['class' => 'btn btn-outline-success my-2 my-sm-0', 'name' => 'signup-button']) ?>
            </div>      
        </div>
<?php ActiveForm::end(); ?>
<?php if ($object): $n=1;?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Transaction id</th>
      <th scope="col">Payment</th>
      <th scope="col">Category name</th>
      <th scope="col">Wallet</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($object as $key =>$item ) : ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $item['transaction_id']; ?></td>
      <td><?php echo number_format($item['payment'])." VND";?><i class="fa fa-facebook" aria-hidden="true"></i></td>
      <td><?php echo $item['category_name']; ?></td>
      <td><?php echo $item['description']; ?></td>
      <td><?php echo $item['date']; ?></td>
      <td><?php echo Html::a('Delete',['transaction/delete','transaction_id'=>$item['transaction_id']], ['onClick'=>'return ConfirmDelete()'] , ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Edit',['transaction/edit','transaction_id'=>$item['transaction_id']], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Add',['transaction/add'], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
      </td>
    </tr>
    <?php $n++;endforeach;?>
  </tbody> 
</table>
<?php endif;?>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Bạn có thật sự muốn xóa không?");
      if (x)
          return true;
      else
        return false;
    }
</script> 
<!-- Liên kết Jquery -->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Liên kết PopperJS -->
<script src="vendor/popperjs/popper.min.js"></script>
<!-- Liên kết Bootstrap -->
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<!-- Custom script - Các file js do mình tự viết -->
<script src="assets/js/app.js"></script>