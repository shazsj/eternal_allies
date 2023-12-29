<?php
include_once "../config/dbconnect.php";

if (!empty($_POST['c_name']) && !empty($_POST['c_qty'])) {
    $cat_name = mysqli_real_escape_string($conn, $_POST['c_name']);
    $cat_qty = mysqli_real_escape_string($conn, $_POST['c_qty']); // Change variable name to cat_qty

    $stmt = $conn->prepare("INSERT INTO categories (cat_name, cat_qty) VALUES (?, ?)");
    $stmt->bind_param("ss", $cat_name, $cat_qty);

    if ($stmt->execute()) {
        echo "Records added successfully.";
    } else {
        echo mysqli_error($conn);
    }

    $stmt->close();
} else {
    echo "Invalid data provided.";
}
?>
