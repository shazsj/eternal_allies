<div class="container p-5">
    <h4>Edit Category Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM categories WHERE cat_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);

    // Fetch the data into $row1
    $row1 = mysqli_fetch_assoc($qry);
    ?>
    <form id="update-Categories" onsubmit="updateCategories(); return false;" enctype='multipart/form-data'>
        <div class="form-group">
            <input type="hidden" id="cat_id" value="<?= $row1['cat_id'] ?>">
        </div>
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="cat_name" value="<?= $row1['cat_name'] ?>">
        </div>
        <div class="form-group">
            <label for="quantity">Category Quantity:</label>
            <input type="number" class="form-control" id="cat_qty" value="<?= $row1['cat_qty'] ?>">
        </div>
        <div class="form-group">
        <button type="button" style="height:40px" class="btn btn-primary" onclick="updateCategories()">Update Category</button>
        </div>
    </form>
</div>