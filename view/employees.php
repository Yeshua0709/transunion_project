<?php

include ("../classes/User.php");

session_start ();
if(!isset($_SESSION["login"])){
	header("location:./view/login.php"); 
}

    // Retrieve the user object from the session
    $user = $_SESSION["user"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
</head>
<body>

<h1>Employees</h1>


    
</body>
</html>