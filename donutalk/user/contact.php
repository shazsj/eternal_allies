<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONTACT INFORMATION</title>

  <style>
body, html {
    font-family: system-ui;
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
}

body {
    padding: 10px;
    background-image: url('./uploads/contacts.svg');
    background-position: right;
    text-align: justify;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
}


#container {
    position: relative;
    z-index: 1;
}

#success-section {
    position: relative;
    z-index: 2;
}

#container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

#success-section {
    text-align: center;
    font-size: 36px;
    font-family: sans-serif;
    padding: 20px;
    border: 4px solid #ccc;
    border-radius: 8px;
    color: black;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); /* Changed the shadow to a blur effect */
}

.hidden {
    display: relative; /* Changed 'relative' to 'none' for hiding */
}
</style>
</head>
<button onclick="location.href='landingpage.php'">Back</button>
</html>