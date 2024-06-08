<?php

include ("../classes/User.php");

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
    <title>Units</title>
    <link rel="stylesheet" href="../styles/font.css">
    <link rel="stylesheet" href="../styles/index.css">
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
background:#F5F5F5;

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
    background:none;
}

.employee-container{
  margin:1em;
    height: 88vh;
    background:white;
    padding:1em;
    box-shadow: 0 2px 3px rgb(0,0,0,0.3);
    border-radius: 5px;
}

.emp-table-container{
    height: 90%;
    overflow: auto;
}
.emp-table{
  width:100%;
  text-align:center;
}

.emp-data td{
    border-bottom:1px solid #00A6CA;
    padding:10px;
  
}

tr th{
    background:#00A6CA;
    color:white;
    padding:10px;
}

.search-add{
    display:flex;
    width:100%;
    justify-content: space-between;
  
    margin:1em 0;
}


.add .add-emp{
    padding:10px;
    border:none;
    background:none;
    background:#00A6CA;
    color:white;
    border-radius: 5px;
    box-shadow: 0 3px 5px rgb(0,0,0,0.3);
}


.search-input{
padding:10px;
border:none;
background:none;
border-radius: 4px;
box-shadow:inset 0 3px 5px rgb(0,0,0,0.2);
margin-right:1em ;
}


.search-btn{
    padding:10px 20px;
border:none;
background:#FCD800;
border-radius: 4px;
box-shadow: 0 3px 5px rgb(0,0,0,0.3);
color:white;
}

.overlay{
    background:rgb(0,0,0,0.4);
    position:absolute;
    width:100%;
    height:100vh;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    z-index: 4;
}

.add-emp-modal{
    position: absolute;
    width: 300px;
    height: auto;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    z-index:5;
    background:white;
    padding:2em;
    border-radius: 3px;
}

.add-emp-modal-container .form-row input {

    width:100%;
    padding:10px;
    margin:1em 0;
  
}


.add-emp-title{
    text-align: center;
    color:#00A6CA;
}

#emp_modal_btn, #overlay{
    cursor: pointer;
}


.form-row .fields{
    padding: 10px;
    border: none;
    background: none;
    border-radius: 4px;
    box-shadow: inset 0 3px 5px rgb(0, 0, 0, 0.2);
    margin-right: 1em;
}

.field-submit-btn{
    border:none;
    background: #00A6CA;
    color:white;
    box-shadow: 0 3px 5px rgb(0,0,0,0.3);
}

.add-emp-modal{
    box-shadow: 0 3px 5px rgb(0,0,0,0.3);
}

.success-msg{
    background:#d4edda;
    color:#155724;
    margin:1em;
    padding:1em;
    border:1px solid #c2e5ca;
    border-radius: 4px;
}
</style>
<div class="main">

<div class="overlay" id="overlay"></div>
            <div class="add-emp-modal" id="emp_modal">
                <div class="add-emp-modal-container">
                <p class="add-emp-title">
                    Add a new employee
                </p>

                <br>
                <form method="POST" action="../controller/add-employee.php">

                    <div class="form-row">
                        <input class="fields" type="text" name="emp_name" placeholder="Enter Employee Name">
                    </div>

                    <div class="form-row">
                        <input class="fields" type="text" name="emp_dept" placeholder="Enter Employee Department">
                    </div>

                    <div class="form-row">
                        <input class="field-submit-btn" type="submit" name="add" value="Add Employee">
                    </div>

                </form>
                
                </div>
               
            </div>



    <div class="navigation">
        <div class="ul">

        <div class="li"><a class="filler" href="">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postcard" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0zM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5M10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM13 8h-2V6h2z"/>
                </svg>
    
    </a> </div>


            <div class="li"><a  href="../index.php">
                
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postcard" viewBox="0 0 16 16">
                 <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0zM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5M10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM13 8h-2V6h2z"/>
            </svg>

            Dashboard 
</a> </div>

            <div class="li"><a  href="units.php">

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
               <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"/>
            </svg>

            
            Units
        
        </a></div>


            <div class="li"><a class="nav-active" href="#">
                
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                 <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
            </svg>
            
            Employees</a></div>


            <div class="li"><a class="" href="../controller/logout_process.php">
                
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

            <?php
    
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p class='success-msg'>New employee added successfully.</p>";
    }
   ?>

            <main class="employee-container">

           
            <?php include '../controller/get_employees.php'; ?>

            </main>

        </div>

    </div>


</div>



<script>

    console.log("test");

    var overlay = document.getElementById("overlay");
    var emp_modal = document.getElementById('emp_modal');
    overlay.style.display = 'none';
    emp_modal.style.display = 'none';

    var emp_modal_btn = document.getElementById('emp_modal_btn');

    emp_modal_btn.addEventListener('click', function(){
        overlay.style.display = 'block';
        emp_modal.style.display = 'block';

    })

    overlay.addEventListener('click',()=>{
        overlay.style.display = 'none';
        emp_modal.style.display = 'none';
    })

</script>


</body>
</html>
