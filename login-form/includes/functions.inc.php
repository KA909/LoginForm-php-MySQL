<?php
function emptyInputSignup($name, $email, $username,  $pwd,  $rpwd){
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($rpwd)){
        return true;
    }
    else{
        return false;
    
    }   
}

function invalidUid($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        return true;
    }
    else{
        return false;
    }
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function pwdMatch($pwd, $rpwd){
    if($pwd !== $rpwd){
        return true;
    }
    else{
        return false;
    }

}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid=? OR usersEmail=?;";
    //Create Prepared Statement
    $stmt = mysqli_stmt_init($conn);

    //If something goes wrong-error handling
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stmdFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);   // Bind the parameters inside database
    mysqli_stmt_execute($stmt);                              //Run parameters inside the database
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);

}


function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersname, usersemail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    //If something goes wrong-error handling
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stmdFailed");
        exit();
    }
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../login.php?error=none");
    exit();

}

function emptyInputLogin($username, $pwd){
    if (empty($username) || empty($pwd)){
        return true;
    }
    else{
        return false;
    }   
}

function LoginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);
    if($uidExists === false){
        header("Location:../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkedPwd = password_verify($pwd,  $pwdHashed);

    if($checkedPwd === false){
        header('Location:../login.php?error=wronglogin');
        exit();
    }
    else if($checkedPwd == true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["username"] = $uidExists["usersName"];
        header("Location:../index.php");
        exit();
    }

}




