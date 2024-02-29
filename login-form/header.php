<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
    *{
        margin: 0;
    }
     ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }
    
    li {
        float: left;
        border-right:1px solid #bbb;
    }
    
    li:last-child {
        border-right: none;
    }
    
    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    
    li a:hover:not(.active) {
        background-color: #111;
    }
    
    .active {
        background-color: #04AA6D;
    }

    .main-form, .signup-form, .alert-danger, .alert-success{
        margin-right: auto;
        max-width: 40%;
        margin-left: 30px;
       
    }

    .alert-danger, .alert-success{
        margin-top: 10px; 
    }

    .home-body{
        margin-left: 23px;
        margin-top: 30px;
    }
  

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <ul>
        <li><a class="active" href="./index.php">Home</a></li>
        <li style="float:right">
            <?php
                if(isset($_SESSION["username"])){
                    echo "<li style='float:right'><a href='includes/logout.inc.php'>Logout</a></li>";
                    echo "<li style='float:right'><a href='profile.php'>".$_SESSION["username"].'</a></li>';
                }
                
                else{
                    echo '<a href = "login.php">'.'Login'.'</a>';
                }
            ?>
        </li>
    </ul>

    