<?php
// Include your database connection file
include 'dbconnect.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if the user is not logged in
    exit();
}

// Retrieve the user's current order status from the database
$user_id = $_SESSION['user_id'];

// Assuming you have a database connection named $conn in dbconnect.php
// Adjust the table and column names based on your actual database schema
$query = "SELECT order_status FROM orders WHERE user_id = ? ORDER BY date_ordered DESC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($order_status);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Progress Tracker</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
        font-family: 'Poppins';
        background-image: url('/uploads/18.svg'); /* Replace '1' with the actual image filename and extension */
        background-size: cover; /* Adjust as needed */
        background-repeat: no-repeat;
        background-position: center center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0; /* Remove default margin */
    }


        .step-wizard {
            background-color:black;
            background-image: url('to.svg'); 
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .step-wizard-list {
            background: #fff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            color: #333;
            list-style-type: none;
            border-radius: 10px;
            display: flex;
            padding: 20px 10px;
            position: relative;
            z-index: 10;
        }

        .step-wizard-item {
            padding: 0 20px;
            flex-basis: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            text-align: center;
            min-width: 170px;
            position: relative;
        }

        .step-wizard-item+.step-wizard-item:after {
            content: "";
            position: absolute;
            left: 0;
            top: 19px;
            background: #21d4fd;
            width: 100%;
            height: 2px;
            transform: translateX(-50%);
            z-index: -10;
        }

        .progress-count {
            height: 40px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 600;
            margin: 0 auto;
            position: relative;
            z-index: 10;
            color: transparent;
        }

        .progress-count:after {
            content: "";
            height: 40px;
            width: 40px;
            background: #21d4fd;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: -10;
        }

        .progress-count:before {
            content: "";
            height: 10px;
            width: 20px;
            border-left: 3px solid #fff;
            border-bottom: 3px solid #fff;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -60%) rotate(-45deg);
            transform-origin: center center;
        }

        .progress-label {
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
        }

        .current-item .progress-count:before,
        .current-item~.step-wizard-item .progress-count:before {
            display: none;
        }

        .current-item~.step-wizard-item .progress-count:after {
            height: 10px;
            width: 10px;
        }

        .current-item~.step-wizard-item .progress-label {
            opacity: 0.5;
        }

        .current-item .progress-count:after {
            background: #fff;
            border: 2px solid #21d4fd;
        }

        .current-item .progress-count {
            color: #21d4fd;
        }
    </style>
</head>

<body>
    <section class="step-wizard">
        <ul class="step-wizard-list">
            <li class="step-wizard-item <?php echo ($order_status == 'C') ? 'current-item' : ''; ?>">
                <span class="progress-count">1</span>
                <span class="progress-label">Order Confirmed</span>
            </li>
            <li class="step-wizard-item <?php echo ($order_status == 'PK') ? 'current-item' : ''; ?>">
                <span class="progress-count">2</span>
                <span class="progress-label">Order Packed</span>
            </li>
            <li class="step-wizard-item <?php echo ($order_status == 'P') ? 'current-item' : ''; ?>">
                <span class="progress-count">3</span>
                <span class="progress-label">Your order is out for delivery</span>
            </li>
            <li class="step-wizard-item <?php echo ($order_status == 'D') ? 'current-item' : ''; ?>">
                <span class="progress-count">4</span>
                <span class="progress-label">Delivered</span>
            </li>
        </ul>
    </section>
</body>

</html>