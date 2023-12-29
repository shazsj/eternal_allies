<?php
include_once 'dbconnect.php';

function generateReferenceNumber() {
    return 'REF' . date('YmdHis') . rand(10000, 99999);
}

function getCategoryNameById($categoryId, $categories) {
    foreach ($categories as $category) {
        if ($category['cat_id'] == $categoryId) {
            return $category['cat_name'];
        }
    }
    return '';
}

session_start();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    echo "User not authenticated!";
    exit;
}

// Fetch categories from the database
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

// Check if the query was successful
$categories = $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : array();

// Fetch items from the database
$itemQuery = "SELECT * FROM items";
$itemResult = mysqli_query($conn, $itemQuery);

// Check if the query was successful
$items = $itemResult ? mysqli_fetch_all($itemResult, MYSQLI_ASSOC) : array();

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $selectedCategory = mysqli_real_escape_string($conn, $_POST['cat_name']);
    $selectedDonuts = isset($_POST['donuts']) ? $_POST['donuts'] : [];

    $userId = $_SESSION['user_id'];
    $categoryId = $selectedCategory;
    $categoryName = getCategoryNameById($categoryId, $categories);
    $paymentMethod = 'Cash On Delivery';
    $paymentStatus = 'I';
    $orderStatus = 'P';
    $totalAmount = 0;

    // Generate reference number
    $referenceNumber = generateReferenceNumber();

    // Process selected donuts and prepare a string with the names
    $selectedDonutNames = array();
    foreach ($selectedDonuts as $index => $selectedDonut) {
        list($itemName, $itemPrice, $itemQty) = explode('|', $selectedDonut);
        $totalAmount += $itemPrice * $itemQty;
        $selectedDonutNames[] = $itemName;
    }

    // Convert the array of donut names to a comma-separated string
    $donutNamesString = implode(', ', $selectedDonutNames);

    $insertOrderQuery = "INSERT INTO orders (reference_number, user_id, name, phone_number, address, cat_name, item_name, total_amount, order_qty, payment_method)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertOrderQuery);

    if ($stmt) {
        $orderQty = count($selectedDonuts);
        mysqli_stmt_bind_param($stmt, 'ssssssssis', $referenceNumber, $userId, $name, $phoneNumber, $address, $categoryName, $donutNamesString, $totalAmount, $orderQty, $paymentMethod);
        mysqli_stmt_execute($stmt);

        header('location: orderdetails.php?ref=' . $referenceNumber);

        mysqli_stmt_close($stmt);
        exit;
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donualk Order Page</title>
    <style>
         body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('./uploads/6.svg');
            background-position: right;
            text-align: justify;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #container {
            width: 80%;
            max-width: 600px;
            text-align: center;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        header {
            background-color: #B4D4FF;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        section {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .step {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #B4D4FF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #donutOptionsContainer h2 {
            margin-top: 10px;
        }

        .hidden {
            display: none;
        }
        
        @media (max-width: 600px) {
            #container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div id="container">
        <header>
            <h1>Donutalk Order Page</h1>
        </header>

    <section>
        <form id="orderForm" method="post" action="">
            <div id="cat_name" class="step">
                <h2>Choose Category</h2>
                <select name="cat_name" onchange="generateDonutOptions()">
                    <?php foreach ($categories as $category): ?>
                        <option value='<?php echo $category['cat_id']; ?>' data-qty='<?php echo $category['cat_qty']; ?>'>
                            <?php echo $category['cat_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="donutOptionsContainer" class="step hidden">
            </div>

            <div id="totalAmount" class="hidden">Total Amount: ₱0.00</div>

            <button type="button" onclick="proceedToCheckout()" class="hidden" id="revealInfoBtn">Proceed to Checkout</button>

            <div id="userInformation" class="step hidden">
                <label for="name">Name:</label>
                <input type="text" name="name" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" name="phone_number" required>

                <label for="address">Address:</label>
                <textarea name="address" required></textarea>

                <label for="payment_method">Payment Method:</label>
                <input type="text" name="payment_method" value="Cash On Delivery" readonly>

                <button type="button" onclick="confirmOrder()">Confirm Order</button>
            </div>
        </form>
    </section>

    <script>
        function updateTotalAmount() {
            var selectedItemPrices = Array.from(document.getElementsByClassName("donutSelect")).map(select => {
                var parts = select.value.split('|');
                return { price: parseFloat(parts[1]), qty: parseInt(parts[2]) || 1 };
            });

            var totalAmount = selectedItemPrices.reduce((sum, { price, qty }) => sum + price * qty, 0);
            document.getElementById("totalAmount").innerText = "Total Amount: ₱" + totalAmount.toFixed(2);
        }

        function confirmOrder() {
            document.getElementById("orderForm").submit();
        }

        function generateDonutOptions() {
            var categorySelect = document.querySelector('[name="cat_name"]');
            var donutOptionsContainer = document.getElementById("donutOptionsContainer");
            var totalAmountDiv = document.getElementById("totalAmount");
            var revealInfoBtn = document.getElementById("revealInfoBtn");

            var donutCount = parseInt(categorySelect.options[categorySelect.selectedIndex].getAttribute('data-qty')) || 0;

            donutOptionsContainer.innerHTML = "";

            for (var i = 1; i <= donutCount; i++) {
                var donutOption = document.createElement("div");
                donutOption.innerHTML = `
                    <h2>Donut ${i}</h2>
                    <select name="donuts[${i-1}]" class="donutSelect" onchange="updateTotalAmount()" data-index="${i}">
                        <?php foreach ($items as $item): ?>
                            <option value='<?php echo $item['item_name'] . '|' . $item['item_price']; ?>|1'>
                                <?php echo $item['item_name']; ?> - ₱<?php echo $item['item_price']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                `;
                donutOptionsContainer.appendChild(donutOption);
            }

            // Show the donut options
            donutOptionsContainer.classList.remove("hidden");

            // Show the total amount initially
            totalAmountDiv.classList.remove("hidden");

            // Show the "Reveal User Information" button
            revealInfoBtn.classList.remove("hidden");
        }

        function proceedToCheckout() {
            document.getElementById("userInformation").classList.remove("hidden");
        }
    </script>
</body>
</html>