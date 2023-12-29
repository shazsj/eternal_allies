<?php

include_once 'dbconnect.php';

session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = $_POST['password'];

   $select = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'A'){

         $_SESSION['admin_name'] = $row['name'];
         header('location: admin/index.php');

      } elseif($row['user_type'] == 'U'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_id'] = $row['user_id'];
         header('location: user/landingpage.php');

      }
     
   } else {
      $error[] = 'Try Again';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
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
         height: 300px;/* Set a fixed width for the container */
      }

      h3 {
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
</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>LOGIN NOW</h3>

         <input type="text" name="username" required placeholder="Username">
         <input type="password" name="password" required placeholder="Password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p> Don't have an account? <a href="register.php">Register Here!</a></p>
      </form>
   </div>

</body>

</html>