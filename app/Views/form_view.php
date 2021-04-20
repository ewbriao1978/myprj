


<?php
    if (session()->get('messageRegisterOk')){
        ?>
        
        <div class="alert alert-info" role="alert">
        
                <?php echo "<strong>". session()->getFlashdata('messageRegisterOk')."</strong>"; ?>
        </div>
<?php
    }
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach($productList as $item):?>
    <tr>
        <th scope="row"> <?=$item['id']?></th>
        <td>    <?=$item['title']?> </td>
        <td>    <?=$item['description']?> </td>
        <td>    <?=$item['quantity']?> </td>
        <td>    <?=$item['price']?> </td>
        <td><a href="<?php echo base_url('product/edit/'.$item['id']);?>" class="btn btn-info">Edit</a></td>

        <td><a href="<?php echo base_url('product/delete/'.$item['id']);?>" class="btn btn-danger" onClick='return confirmDialog();'>Delete</a></td>
        

        <script>
          function confirmDialog() {
            return confirm("Are you sure you want to delete this product?")
          }
        </script>

        
    </tr>

    <?php endforeach;?>
    
  </tbody>
</table>

   