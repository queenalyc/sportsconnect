<?php
if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';

    $name = $_POST['nameid'];
    $email = $_POST['emailid'];
    $password = $_POST['pwdid'];
    $repassword = $_POST['repwdid'];
    $checkRole = $_POST['role'];

    if(empty($name) || empty($email) || empty($password) || empty($repassword) || empty($checkRole)) {
        header("Location: ../signup.php?error=emptyfields&name=".$name."&email=".$email);
        exit();
    }
    
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&name=".$name);
        exit();
    }
    else if($password !== $repassword) {
        header("Location: ../signup.php?error=passwordcheck&name=".$name."&mail=".$email);
        exit();
    }
    else {
        //selecting 
        $sql = "SELECT email from user_login WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");       
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location: ../signup.php?error=emailexist&name=".$name);
                exit();
            }
            else {
                $sql =  "INSERT INTO user_login (name, email, password, roleID) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hashPwd, $checkRole);
                    mysqli_stmt_execute($stmt);
                    if($checkRole==2){
                        $sql ="SELECT userID FROM user_login WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            $resultString = $row['userID'];
                            echo $resultString;
                        }
                        $sql2 = "INSERT INTO coach (userID,name) VALUES (?,?)";
                        echo $sql2;
                        $stmt2 = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt2, $sql2)){
                            header("Location: ../signup.php?error=sqlerror");
                            //die(mysqli_error());
                        }
                        else{
                            mysqli_stmt_bind_param($stmt2, "ss", $resultString,$name);
                            mysqli_stmt_execute($stmt2);
                            header("Location:../main.php?signup=success");
                        }
                    }
                    else if($checkRole==1){
                        $sql ="SELECT userID FROM user_login WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            $resultString = $row['userID'];
                            echo $resultString;
                        }
                        $sql2 = "INSERT INTO student (userID,name) VALUES (?,?)";
                        echo $sql2;
                        $stmt2 = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt2, $sql2)){
                            header("Location: ../signup.php?error=sqlerror");
                            //die(mysqli_error());
                        }
                        else{
                            mysqli_stmt_bind_param($stmt2, "ss", $resultString,$name);
                            mysqli_stmt_execute($stmt2);
                            header("Location:../main.php?signup=success");
                        }
                    }
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else {
    header("Location: ../index.php");
    exit();
}