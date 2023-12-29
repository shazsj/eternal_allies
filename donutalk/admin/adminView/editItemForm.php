<div class="container p-5">
    <h4>Edit Product Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM items WHERE item_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);

    // Fetch the data into $row1
    $row1 = mysqli_fetch_assoc($qry);
    ?>
    <form id="update-Items" onsubmit="updateItems(); return false;" enctype='multipart/form-data'>
        <div class="form-group">
            <input type="hidden" id="item_id" value="<?= $row1['item_id'] ?>">
        </div>
        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" id="item_name" value="<?= $row1['item_name'] ?>">
        </div>
        <div class="form-group">
            <label for="desc">Item Description:</label>
            <input type="text" class="form-control" id="item_desc" value="<?= $row1['item_desc'] ?>">
        </div>
        <div class="form-group">
            <label for="price">Item Price:</label>
            <input type="number" class="form-control" id="item_price" value="<?= $row1['item_price'] ?>">
        </div>
        <div class="form-group">
            <label for="status">Item Status:</label>
                <div class="form-check">
                <input type="radio" class="form-check-input" id="available" name="item_status" value="A" <?php echo ($row1['item_status'] == 'A') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="available">Available</label>
            </div>
            <div class="form-check">
                 <input type="radio" class="form-check-input" id="unavailable" name="item_status" value="U" <?php echo ($row1['item_status'] == 'U') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="unavailable">Unavailable</label>
            </div>
        </div>
        <div class="form-group">
            <img width='200px' height='150px' src='<?= $row1["item_image"] ?>'>
            <div>
                <label for="file">Choose Image:</label>
                <input type="hidden" id="existingImage" class="form-control" value="<?= $row1['item_image'] ?>">
                <input type="file" id="newImage">
            </div>
        </div>
        <div class="form-group">
            <button type="button" style="height:40px" class="btn btn-primary" onclick="updateItems()">Update Item</button>
        </div>
    </form>
</div>