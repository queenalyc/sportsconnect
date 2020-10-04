<?php 
session_start();
require 'dbh.inc.php';

// if(isset($_POST['update-class-submit'])){
//     //get the fields from the form
//     $name = $_POST['coachnameid'];
//     $sport = $_POST['sportid'];
//     $trnglevel = $_POST['levelid'];
//     $location = $_POST['locationid'];
//     $day = $_POST['dayid'];
//     $time = $_POST['timeid'];
//     $rate = $_POST['rateid'];
//     $size = $_POST['sizeid'];

//     if(isset($_SESSION['uid'])){
//         if($_SESSION['roleid']==2){ 
//             $sql = "UPDATE class set coach_name= '".$name."'; where coachID='".$classid."'";
//             $stmt = mysqli_stmt_init($conn);
//             echo $name;
//             if(!mysqli_stmt_prepare($stmt, $sql)){
//                 //header("Location: ../updateprofile.php?error=sqlerror");
//                 echo $classid;
//             }
//             else{
//                 mysqli_stmt_bind_param($stmt, "s",$name);
//                 mysqli_stmt_execute($stmt);
//                 header("Location: ../viewprofile.php");
//             }
//         }
//     }
//      mysqli_stmt_close($stmt);
//         mysqli_close($conn);

// }

if(isset($_SESSION['uid'])){
    if($_SESSION['roleid']==2){
        if(isset($_POST['update-class-submit'])){
            //get the fields from the form
            $name = $_POST['coachnameid'];
            $sport = $_POST['sportid'];
            $trnglevel = $_POST['levelid'];
            $location = $_POST['locationid'];
            $day = $_POST['dayid'];
            $time = $_POST['timeid'];
            $rate = $_POST['rateid'];
            $size = $_POST['sizeid'];
            $classid = $_POST['class-id'];
            
            $sql = "UPDATE class set coach_name= ?, sport=?, trng_level=?, location=?, day_class=?, time=?, rate=?, class_size=? where classID='".$classid."'";
            echo $sql;
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                //header("Location: ../updateclass.php?error=sqlerror");
                echo $classid;
            }
            else{
                mysqli_stmt_bind_param($stmt, "ssssssdd",$name,$sport,$trnglevel,$location,$day,$time,$rate,$size);
                mysqli_stmt_execute($stmt);
                header("Location: ../viewclass.php");
            }
        }
    }
}


?>