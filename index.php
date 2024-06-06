<?php

include ("classes/User.php");

session_start ();
if(!isset($_SESSION["login"])){
	header("location:./view/login.php"); 
}


    $user = $_SESSION["user"];


    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>

<div class="main">

<div class="navigation">
    <div class="ul">
        <div class="li"><a href="">Dashboard</a></div>
        <div class="li"><a href="">Units</a></div>
        <div class="li"><a href="">Employees</a></div>
    </div>
</div>


<div class="content">

<div class="container">
<header>
    <p>  <?php echo $user->username; ?> </p>
</header>

<main>
 <p>body here</p>
</main>

</div>
</div>


</div>






</body>
</html>
