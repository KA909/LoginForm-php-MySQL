<?php

$serverName = 'localhost';
$dbUserName = 'jarvis123';
$dbPassword = 'K]3oBJO[p]*E)_0F';
$dbName = 'slgeekschool';

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName );

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

