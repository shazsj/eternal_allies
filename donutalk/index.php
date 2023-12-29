<!DOCTYPE html>
<html lang="en">

<head>
    <title>DONUTALK</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: system ui;
            text-decoration: none;
            color: black;
        }

        html {
            font-size: 62.5%;
        }

        body {
            background-image: url('user/uploads/welcome.png'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            margin-top: 20px;
            text-align: center;
        }

        .header a {
            margin: 10px;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="indexabout.php">About</a>
        <a href="indexcontact.php">Contacts</a>
        <a href="user/product.php">Products</a>
        <a href="login.php">Login</a>
    </div>
</body>

</html>