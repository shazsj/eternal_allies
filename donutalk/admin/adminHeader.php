<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #FF90BC;">
    
    <div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo.gif" width="80" height="80" alt="">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    <a href="../logout.php" style="color: black; text-decoration: none;">Logout</a>
</nav>