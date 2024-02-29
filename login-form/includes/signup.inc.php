<?php
if (isset($_POST["signup-submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $rpwd = $_POST["r-password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $emptyInputs = emptyInputSignup($name, $email, $username,  $pwd,  $rpwd);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $rpwd);
    $uidExists = uidExists($conn, $username, $email);

    if ($emptyInputs !== false){
        header("Location:../signup.php?error=emptyinput");
        exit();
    }
    if ($invalidUid !== false){
        header("Location:../signup.php?error=invaildUid");
        exit();
    }
    if ($invalidEmail !== false){
        header("Location:../signup.php?error=invaildEmail");
        exit();
    }
    if ($pwdMatch !== false){
        header("Location:../signup.php?error=passwordMismatch");
        exit();
    }
    if ($uidExists !== false){
        header("Location:../signup.php?error=usernameTaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

}else{
        header('Location:../login.php');
        exit();
 }
 



