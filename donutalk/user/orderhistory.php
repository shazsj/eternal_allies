<?php
include('dbconnect.php');

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY date_ordered DESC, order_id DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            padding: 10px;
            background-image: url('./uploads/18.svg');
            background-position: right;
            text-align: justify;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            color:black;
        }

        h2 {
            color: black; 
        }

        table {
            color: black;
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid white;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Order History</h2>

<?php
// Display order history
if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Order ID</th>
                <th>Reference Number</th>
                <th>Category Name</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Date Ordered</th>
            </tr>";

    $orderNumber = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$orderNumber}</td>
                <td>{$row['reference_number']}</td>
                <td>{$row['cat_name']}</td>
                <td>{$row['item_name']}</td>
                <td>{$row['order_qty']}</td>
                <td>{$row['total_amount']}</td>
                <td>{$row['date_ordered']}</td>
              </tr>";

        $orderNumber++;
    }

    echo "</table>";
} else {
    echo "No orders found.";
}

mysqli_close($conn);

?>
<button onclick="location.href='landingpage.php'">Back</button>
</body>
</html>