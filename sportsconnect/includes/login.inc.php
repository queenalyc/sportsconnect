<?php
    if(isset($_POST['login-submit']))  {
        require 'dbh.inc.php';
        $email = $_POST['emailid'];
        $password = $_POST['pwdid'];
        
            $sql = "SELECT * FROM user_login WHERE email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../login.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, 's', $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password, $row['password']);
                    if($pwdCheck == false){
                        header("Location: ../login.php?error=incorrectpassword");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['uid'] = $row['userID'];
                        $_SESSION['nameid'] = $row['name'];
                        $_SESSION['roleid'] = $row['roleID'];

                        if($_SESSION['roleid']==2){
                            $user = $_SESSION['uid'];
                            $sql = "SELECT * FROM user_coach where userID = ?;";
                            $stmt = mysqli_stmt_init($conn);
                            // echo $sql;
                            // echo $user;
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("Location: ../login.php?error=sqlerror");
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt, 'd', $user);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if($row = mysqli_fetch_assoc($result)){
                                    $_SESSION['coachid'] = $row['coachID']; //get coachID from user_coach view
                                    //echo $_SESSION['coachid'];
                                }
                            }
                            
                        }
                        
                        header("Location: ../main.php?login=success");
                        exit();
                    }
                }
                else{
                    header("Location: ../login.php?error=userdoesnotexist");
                    exit();
                }
            }
    }
    else{
        header("Location: ../mainn.php");
        exit();
    }