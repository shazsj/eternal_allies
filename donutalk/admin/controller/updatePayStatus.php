<?php

include_once "../config/dbconnect.php";

$order_id = $_POST['record'];

$sql = "SELECT payment_status FROM orders WHERE order_id='$order_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if ($row["payment_status"] == 'I') {
    $update = mysqli_query($conn, "UPDATE orders SET payment_status='C' WHERE order_id='$order_id'");
} elseif ($row["payment_status"] == 'C') {
    $update = mysqli_query($conn, "UPDATE orders SET payment_status='I' WHERE order_id='$order_id'");
}

// If you want to check if the update was successful, you can uncomment the following lines:
// if ($update) {
//     echo "success";
// } else {
//     echo "error";
// }

?>
