<?php

session_start ();

include("connection.php"); 
include ("../classes/User.php");


if(isset($_REQUEST['login']))
{

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];


$res = mysqli_query($mysqli, "select * from user where username='$username'and password='$password'");

$result=mysqli_fetch_array($res);


if($result)

{
	$_SESSION["login"]="1";

     // Create a User object using fetched data
     $user = new User($result['id'], $result['username'], $result['password']);

     // Storing user object in session
     $_SESSION["user"] = $user;


	header("location:../index.php");
}
else	
{
	header("location:../view/login.php?err=1");
	
}
}
?>