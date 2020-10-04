<?php
 session_start();
if(isset($_POST['class-submit'])){
    require 'dbh.inc.php';

    $name = $_POST['coachnameid'];
    $sport = $_POST['sportid'];
    $level = $_POST['levelid'];
    $location = $_POST['locationid'];
    $day = $_POST['dayid'];
    $time = $_POST['timeid'];
    $rate = $_POST['rateid'];
    $size = $_POST['sizeid'];
    $coachid = $_SESSION['coachid'];
    $status = 1;
 
    if(empty($name) || empty($sport) || empty($level) || empty($location) || empty($day) || empty($time) || empty($rate) || empty($size)){
        header("Location: ../class.php?error=emptyfields&name=".$name);
        //die(mysqli_error());
        exit();
    }
    else{
        
        $sql = "INSERT INTO class (coach_name, coachID, sport, trng_level, location, day_class, time, rate, class_size,status) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        echo $sql;
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            //echo "Something went wrong, try again";
            header("Location: ../class.php?error=sqlerror");
            //die(mysqli_error());
            exit();
        }
        else{
            // prepared statement to prevent sql injection
            mysqli_stmt_bind_param($stmt, "sisssssddd", $name, $coachid, $sport, $level, $location, $day, $time, $rate, $size,$status); //store decimal numbets
            mysqli_stmt_execute($stmt);
            header("Location: ../viewclass.php?classcreationsuccessful");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../index.php");
    exit();
}