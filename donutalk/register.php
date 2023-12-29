<?php
include('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_fullname = $_POST['user_fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_email_address = $_POST['user_email_address'];
    $user_contact_number = $_POST['user_contact_number'];
    $user_address = $_POST['user_address'];

    $sql = "INSERT INTO `users` (`user_fullname`, `username`, `password`, `user_email_address`, `user_contact_number`, `user_address`)
            VALUES ('$user_fullname', '$username', '$password', '$user_email_address', '$user_contact_number', '$user_address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<style>
     body {
         font-family: 'Arial', sans-serif;
         background-image: url('user/uploads/5.svg');
         margin: 0;
         display: flex;
         align-items: center;
         justify-content: center;
         height: 100vh;
      }

      .form-container {
         background-color: #ffc5c5;
         padding: 40px; /* Increase padding for a bigger container */
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         width: 350px; 
         height: 650px;/* Set a fixed width for the container */
      }

      h2 {
         text-align: center;
         font-size: 25px;
      }

      form {
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      input {
         width: 100%;
         padding: 10px;
         box-sizing: border-box;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 4px;
      }

      .form-btn {
         background-color: #ffebd8;
         color: black;
         padding: 10px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }

      .form-btn:hover {
         background-color: #ffebd8;
      }

      p {
         text-align: center;
         margin-top: 15px;
      }

      a {
         color: #428bca;
      }
   </style>
</style>
<body>

<div class="form-container">
<h2>REGISTER</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Full Name: <input type="text" name="user_fullname" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email Address: <input type="email" name="user_email_address" required><br>
    Contact Number: <input type="text" name="user_contact_number" required><br>
    Address: <textarea name="user_address" required></textarea><br>
    <input type="submit" name="submit" value="Register Now" class="form-btn">
</form>
    </div>
</body>
</html>