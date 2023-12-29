<?php
include_once "../config/dbconnect.php";

$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
$p_desc = mysqli_real_escape_string($conn, $_POST['p_desc']);
$p_price = mysqli_real_escape_string($conn, $_POST['p_price']);
$p_status = mysqli_real_escape_string($conn, $_POST['p_status']);

if (isset($_FILES['newImage'])) {
    $location = "./uploads/";
    $dir = '../uploads/';
    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    $image = rand(1000, 1000000) . "." . $ext;
    $final_image = $location . $image;
    
    if (in_array($ext, $valid_extensions)) {
        if (move_uploaded_file($tmp, $dir . $image)) {
            // Update the item with the new image path
            $sql = "UPDATE items SET 
                item_name = '$p_name', 
                item_desc = '$p_desc', 
                item_price = $p_price, 
                item_status = '$p_status',
                item_image = '$final_image'
                WHERE item_id = $product_id";
            
            if ($conn->query($sql) === TRUE) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type.";
    }
} else {
    // If no new image is provided, update without changing the image path
    $sql = "UPDATE items SET 
        item_name = '$p_name', 
        item_desc = '$p_desc', 
        item_price = $p_price, 
        item_status = '$p_status'
        WHERE item_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
        echo "false";
    }
}

$conn->close();
?>
