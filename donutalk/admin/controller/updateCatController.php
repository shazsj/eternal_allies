<?php
include_once "../config/dbconnect.php";

$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
$c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
$c_quantity = mysqli_real_escape_string($conn, $_POST['c_quantity']);

$sql = "UPDATE categories SET 
    cat_name = '$c_name', 
    cat_qty = '$c_quantity' 
    WHERE cat_id = $category_id";

if ($conn->query($sql) === TRUE) {
    echo "true";
} else {
    echo "false";
}

$conn->close();
?>
