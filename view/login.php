<?php

session_start();

//redirect to login page if session has started or already logged in
if(isset($_SESSION["login"])){
    header("location:../index.php"); 
}
	
// Check for error message
$errorMessage = "";
    if(isset($_GET['err']) && $_GET['err'] == '1') {
        $errorMessage = "Invalid email or password. Please try again.";
    } else {
        $errorMessage = "";
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>


<h1> Login Page </h1>

<form method ="POST" action ="../controller/login_process.php">

<input type="text" name="username" placeholder="Enter Username">
<input type="password" name="password" placeholder="Enter Password">

<input type="submit" value="login" name="login">




</form>




</body>
</html>