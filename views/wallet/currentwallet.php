<?php 
use yii\helpers\Html;

?>
<h1>Wallet</h1>
<?php echo Html::a('Set current wallet',['wallet/setcurrentwallet'], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?> &nbsp;
<?php if ($wallet): $n=1;?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Wallet id</th>
      <th scope="col">Balance</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($wallet as $item ) : ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $item->wallet_id; ?></td>
      <td><?php echo number_format($item->balance)." VND";?><i class="fa fa-facebook" aria-hidden="true"></i></td>
      <td><?php echo $item->description; ?></td>
      <td>
          <?php echo Html::a('Edit',['wallet/edit','wallet_id'=>$item->wallet_id], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Add',['wallet/add'], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Transfer money ',['wallet/transfermoney','wallet_id'=>$item->wallet_id], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Add money ',['wallet/addmoney','wallet_id'=>$item->wallet_id], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
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