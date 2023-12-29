<?php

include_once "../config/dbconnect.php";

$item_id = $_POST['record'];
$status = $_POST['status']; // Add this line to get the status parameter

$sql = "SELECT item_status FROM items WHERE item_id='$item_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row["item_status"] == 'U') {
    $update = mysqli_query($conn, "UPDATE items SET item_status='A' WHERE item_id='$item_id'");
} else if ($row["item_status"] == 'A') {
    $update = mysqli_query($conn, "UPDATE items SET item_status='U' WHERE item_id='$item_id'");
}

// If you need to return a response, you can do something like this:
if ($update) {
    echo "success";
} else {
    echo "error";
}

?>
