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
    <link rel="stylesheet" href="../styles/font.css">
</head>

<style>

*{
    padding:0;
    margin:0;
    box-sizing:border-box;
}
.login-container{
width: 100%;
height:100vh;
background:#00A6CA;
display:flex;
align-items: center;
justify-content: center;
}

.login-card{
    margin:0 auto; 
background:white;
padding:2em;
border-radius: 10px;
box-shadow: 0 3px 5px rgb(0,0,0,0.3);
}


.login-card form{
    width:100%;
}
.login-header{
display:flex;
margin: 0 auto;
}


.logo-holder img{
width:70px;
height:auto;
margin-right:1em;
}


.form-row input{
    width:100%;
    padding:1em;
    margin-bottom:2em;
    border:none;
   
}

.input-shadow{
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
}

.login-btn{
    background:none;
    border:none;
    background:#FCD800;
    color:white;
    font-weight: 600;
    border-radius:5px;
    box-shadow: 0 3px 5px rgb(0,0,0,0.1);
    cursor:pointer;
}

.header-container h1{
    color:#00A6CA;
}

.header-container p{
    color: rgb(0,0,0,0.3);

}
</style>


<body>

<div class="login-container">


<div class="login-card">
    <form method ="POST" action ="../controller/login_process.php">


    <div class="login-header">

    <div class="logo-holder">
        <img class="logo" src="../assets/logo.png">
    </div>


    <div class="header-container">

     <h1>Sign-in</h1>
     <p> Please enter your credentials to continue.</p>
    </div>
    </div>

<br>
<br>
<br>
    <div class="form-row">
     <input class="input-shadow" type="text" name="username" placeholder="Enter Username">
    </div>

    <div class="form-row">
    <input class="input-shadow" type="password" name="password" placeholder="Enter Password">
        </div>


        <div class="form-row">
        <input class="login-btn" type="submit" value="SIGN-IN" name="login">
        </div>


</div>


</div>






</form>




</body>
</html>