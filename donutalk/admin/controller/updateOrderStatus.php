<?php
include_once "../config/dbconnect.php";

$order_id = $_POST['record'];

$sql = "SELECT order_status FROM orders WHERE order_id='$order_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$currentStatus = $row["order_status"];

switch ($currentStatus) {
    case 'C':
        $newStatus = 'PK'; // Change to Packed
        break;
    case 'PK':
        $newStatus = 'P'; // Change to Pending
        break;
    case 'P':
        $newStatus = 'D'; // Change to Delivered
        break;
    case 'D':
        $newStatus = 'C'; // Change to Confirmed
        break;
    default:
        // Handle any unexpected values here
        break;
}

$update = mysqli_query($conn, "UPDATE orders SET order_status='$newStatus' WHERE order_id='$order_id'");

// Uncomment the following lines if you want to echo success or error messages
// if($update){
//     echo "success";
// } else {
//     echo "error";
// }
?>
