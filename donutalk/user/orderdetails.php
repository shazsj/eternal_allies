<?php
include_once 'dbconnect.php';

// Start or resume the session
session_start();

// Assuming you have stored user information in the session
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // If the user is not authenticated, you may want to redirect or handle it accordingly
    echo "User not authenticated!";
    exit;
}

// Retrieve the reference number from the URL parameter
if (isset($_GET['ref'])) {
    $referenceNumber = $_GET['ref'];
} else {
    echo "Reference number not provided!";
    exit;
}

// Fetch order details from the database based on the reference number
$query = "SELECT * FROM orders WHERE reference_number = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 's', $referenceNumber);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Start of the outer container for centering
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-image: url(\'./uploads/19.svg\'); background-size: cover;">';

    if ($result) {
        $orderDetails = mysqli_fetch_assoc($result);

        // Start of the inner container
        echo '<div style="max-width: 600px; text-align: center; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">';

        // Display order details
        if ($orderDetails) {
            echo "<h1>Order Details</h1>";
            echo "<p>Reference Number: " . $orderDetails['reference_number'] . "</p>";
            echo "<p>Name: " . $orderDetails['name'] . "</p>";
            echo "<p>Phone Number: " . $orderDetails['phone_number'] . "</p>";
            echo "<p>Address: " . $orderDetails['address'] . "</p>";
            echo "<p>Category: " . $orderDetails['cat_name'] . "</p>";
            echo "<p>Items: " . $orderDetails['item_name'] . "</p>";
            echo "<p>Total Amount: ₱" . number_format($orderDetails['total_amount'], 2) . "</p>";
            echo "<p>Date Ordered: " . $orderDetails['date_ordered'] . "</p>";
            echo "<p>Time Ordered: " . $orderDetails['time_ordered'] . "</p>";

            // Add a button to go back to landingpage.php with the reference number
            echo '<a href="landingpage.php?ref=' . $referenceNumber . '"><button>Back</button></a>';
        } else {
            echo "Order not found!";
        }

        // End of the inner container
        echo '</div>';
    } else {
        echo "Error retrieving order details: " . mysqli_error($conn);
    }

    // End of the outer container
    echo '</div>';

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
