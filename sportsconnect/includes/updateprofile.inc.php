<?php 
session_start();
require 'dbh.inc.php';
//if student form
    if(isset($_POST['profile-submit-student'])){
        //get the fields from the form
        $name = $_POST['studentnameid'];
        $dob = $_POST['dobid'];
        $gender = $_POST['genderid'];
        $sport = $_POST['sportid'];
        $trnglevel = $_POST['levelid'];

        if(isset($_SESSION['uid'])){
            $user = $_SESSION['uid'];
            $sql = "UPDATE student set name= ?, DOB=?, gender=?, sport=?, trnglevel=? WHERE userID = '".$user."';";
            $stmt = mysqli_stmt_init($conn);
            //echo $sql;

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../updateprofile.php?error=sqlerror");
            }
            else{
                mysqli_stmt_bind_param($stmt, "sssss",$name,$dob,$gender,$sport,$trnglevel);
                mysqli_stmt_execute($stmt);
                header("Location: ../viewprofile.php");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    else if(isset($_POST['profile-submit-coach'])){
        //get the fields from the form
        $name = $_POST['coachnameid'];
        $dob = $_POST['dobid'];
        $gender = $_POST['genderid'];
        $sport = $_POST['sportid'];
        $descrip = $_POST['aboutmeid'];

        if(isset($_SESSION['uid'])){
            $user = $_SESSION['uid'];
            $sql = "UPDATE coach set name= ?, DOB=?, gender=?, sport=?, description=? WHERE userID = '".$user."';";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../updateprofile.php?error=sqlerror");
            }
            else{
                mysqli_stmt_bind_param($stmt, "sssss",$name,$dob,$gender,$sport,$descrip);
                mysqli_stmt_execute($stmt);
                header("Location: ../viewprofile.php");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
else {
    header("Location: ../index.php");
    exit();
}
?>