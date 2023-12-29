<div >
  <h2>Products</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">I.D.</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Product Description</th>
        <th class="text-center">Product Price</th>
        <th class="text-center">Product Status</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * FROM items"; // Fixed the syntax error here
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?= $count ?></td>
    <td><img height='100px' src='<?=$row["item_image"]?>'></td>
    <td><?= $row["item_name"] ?></td>
    <td><?= $row["item_desc"] ?></td>
    <td><?= $row["item_price"] ?></td>
    <td><?= $row["item_status"] ?></td>
    <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['item_id']?>')">Edit</button></td>
    <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['item_id']?>')">Delete</button></td>
</tr>

      <?php
        $count = $count + 1;
    }
}
?>

  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form enctype='multipart/form-data' onsubmit="addItems()" method="POST">
    <div class="form-group">
        <label for="i_name">Product Name:</label>
        <input type="text" class="form-control" id="i_name" required>
    </div>
    <div class="form-group">
        <label for="i_price">Price:</label>
        <input type="number" class="form-control" id="i_price" required>
    </div>
    <div class="form-group">
        <label for="i_desc">Description:</label>
        <input type="text" class="form-control" id="i_desc" required>
    </div>
    <div class="form-group">
        <label for="i_status">Status:</label>
        <input type="text" class="form-control" id="i_status" required>
    </div>
    <div class="form-group">
        <label for="file">Choose Image:</label>
        <input type="file" class="form-control-file" id="file">
    </div>
    <div class="form-group">
        <!-- Corrected button ID -->
        <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
    </div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>