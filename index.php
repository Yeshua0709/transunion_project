<?php

include ("classes/User.php");
include ('controller/connection.php');

session_start ();
if(!isset($_SESSION["login"])){
	header("location:./view/login.php"); 
}


    $user = $_SESSION["user"];


    // Deployed Units
$sql_deployed_units = "SELECT COUNT(*) AS deployed_units FROM units WHERE status = 'Assigned'";
$result_deployed_units = $mysqli->query($sql_deployed_units);
$row_deployed_units = $result_deployed_units->fetch_assoc();
$deployed_units = $row_deployed_units['deployed_units'];


// Available Units
$sql_available_units = "SELECT COUNT(*) AS available_units FROM units WHERE status = 'in-storage'";
$result_available_units = $mysqli->query($sql_available_units);
$row_available_units = $result_available_units->fetch_assoc();
$available_units = $row_available_units['available_units'];



// Deployed Units Ratio
$sql_deployed_units_ratio = "
SELECT 
    (SELECT COUNT(*) FROM units WHERE status = 'Assigned') / 
    (SELECT COUNT(*) FROM employees) AS deployed_units_ratio
";
$result_deployed_units_ratio = $mysqli->query($sql_deployed_units_ratio);
$row_deployed_units_ratio = $result_deployed_units_ratio->fetch_assoc();
$deployed_units_ratio = $row_deployed_units_ratio['deployed_units_ratio'];

$deployed_units_ratio = $deployed_units_ratio * 100;

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
<style>
    
*{
    padding:0;
    margin:0;
    box-sizing: border-box;
}

body,html{

}
 

.main{
    display: flex;
    width: 100%;
}

.navigation{
 
   height:100%;
 
}

.navigation .ul{
display: flex;
flex-direction:column;
min-height:100vh;
height: 100%;

background:#00A6CA;

}

.navigation .ul .li {

}

.navigation .ul .li a{
    padding:15px;
 
    display:flex;
   color:white;
   text-decoration:none;
   font-size:12px;
 
}

.navigation .ul .li .nav-active{
    background:white;
color:#00A6CA;
}


.navigation .ul .li .filler{
visibility:hidden;
}
.navigation .ul .li a svg{
    margin-right:10px;
}
.content{
width: 100%;
background:#f5f5f5;

}

header{
  
  background:#066175;
 text-align:right;
 padding:13px;
 padding-right:1.5em;   
}

header p{
    color:white;
   
}


main{
}

.dashboard{
width: 100%;
padding:1em;
}

.dashboard-container{
    width: 100%;
display: flex;
justify-content: space-between;
}

.dashboard-row{
width: 32.5%;
background:white;
box-shadow: 0 3px 5px rgb(0,0,0,0.3);
padding:1em;
border-radius: 3px;
}

.row-header{
font-size: 1.5em;
margin-bottom: 2em;
}

.row-value{
    text-align:right;

}

.project-progress{
    background:#00A6CA;
    color:white;
}

.db-title{
    font-weight:600;
    color:#00A6CA;
}

.db-title-2{
    font-weight:600;
}

.db-value-1{
    font-weight:600;
    color:#00A6CA;
    font-size: 3em;
}

.db-value-2{
    font-weight: 600;
    font-size: 3em;
}
</style>
<div class="main">

    <div class="navigation">
        <div class="ul">

        <div class="li"><a class="filler" href="">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postcard" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0zM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5M10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM13 8h-2V6h2z"/>
                </svg>
    
    </a> </div>


            <div class="li"><a class="nav-active" href="#">
                
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postcard" viewBox="0 0 16 16">
                 <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0zM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5M10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM13 8h-2V6h2z"/>
            </svg>

            Dashboard 
</a> </div>

            <div class="li"><a href="view/units.php">

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
               <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"/>
            </svg>

            
            Units
        
        </a></div>


            <div class="li"><a href="view/employees.php">
                
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                 <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
            </svg>
            
            Employees</a></div>


            <div class="li"><a class="" href="./controller/logout_process.php">
                
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>
                Logout
    
    </a> </div>


        </div>
    </div>


    <div class="content">

        <div class="container">

            <header>
                <p>  <?php echo $user->username; ?> </p>
            </header>

            <main>

            <div class="dashboard">

                <div class="dashboard-container">

                <div class="dashboard-row">
                    <div class="row-header">
                        <p class="db-title">Deployed Units</p>
                    </div>

                    <div class="row-value">
                        <p class="db-value-1" ><?php echo $deployed_units ?></p>
                    </div>
                </div>


                <div class="dashboard-row">
                    <div class="row-header">
                        <p class="db-title"> Available Units</p>
                    </div>

                    <div class="row-value">
                        <p class="db-value-1" ><?php echo $available_units ?></p>
                    </div>
                </div>


                <div class="dashboard-row project-progress">
                    <div class="row-header ">
                        <p class="db-title-2">Project Progress</p>
                    </div>

                    <div class="row-value">
                        <p class="db-value-2"><?php echo $deployed_units_ratio?> %</p>
                    </div>
                </div>



                </div>
            </div>

            </main>

        </div>

    </div>


</div>






</body>
</html>
