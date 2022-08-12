<?php 
use yii\helpers\Html; 
?>

<h1>List transaction</h1>
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