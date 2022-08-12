<?php 
use yii\helpers\Html;

?>

<h1>List Category</h1>
<?php if ($list): $n=1;?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category id</th>
      <th scope="col">Category name</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($list as $item ) : ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $item->category_id; ?></td>
      <td><?php echo $item->category_name;?><i class="fa fa-facebook" aria-hidden="true"></i></td>
      <td><?php echo $item->type; ?></td>
      <td><?php echo Html::a('Delete',['category/delete','category_id'=>$item->category_id], ['onClick'=>'return ConfirmDelete()'] , ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Edit',['category/edit','category_id'=>$item->category_id], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
          <?php echo Html::a('Add',['category/add'], ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
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