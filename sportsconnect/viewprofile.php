<?php
    include_once 'includes/dbh.inc.php';
    require "header.php";
?>
<head>
    <div class="container-fluid">
    <style> 
    .container-fluid{
      position: relative;
    }
  </style>
        <title> Profile </title>
        <h1 class="bannertext2">
            <?php
            if(isset($_SESSION['uid'])){
                if($_SESSION['roleid']==2){
                    $user = $_SESSION['uid'];
                    $sql = "SELECT name FROM coach WHERE userID = '$user'";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while($row = mysqli_fetch_assoc($result)){
                        echo $row['name'];
                        //die(mysqli_error());
                    }
                }
                else if($_SESSION['roleid']==1){
                    $user = $_SESSION['uid'];
                    $sql = "SELECT name FROM student WHERE userID = '$user'";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while($row = mysqli_fetch_assoc($result)){
                        echo $row['name'];
                        //die(mysqli_error());
                    }
                }
            }
           
            ?>
            </h1>
        <style type = "text/css">
            .bannertext2{
                position:absolute;
                left:20%;
                margin-left: -70px;
                margin-top:-100px;
                font-size: 3vw;
                color:white;
                text-transform: capitalize;" 

            }
        </style>
    </div>
</head>

<body>
    <h3 class="profiletext"> <small>
        <div class="card">   
            <div class="card-body">
            <?php
            if(isset($_SESSION['uid'])){
                if($_SESSION['roleid']==2){
                    $user = $_SESSION['uid'];
                    $sql = "SELECT * FROM coach WHERE userID = '$user'";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while($row = mysqli_fetch_assoc($result)){
                        $today = date("Y-m-d");
                        $age = date_diff(date_create($row['DOB']), date_create($today));
                        echo '<div class="container center">
                                <h3>Gender: '.$row['gender'].'</h3>
                                <p>Age: '.$age->format('%y').'</p>
                                <p>Sport: '.$row['sport'].'</p>
                                <p><br> About me: '.$row['description'].'</p>

                            </div>';
                        //die(mysqli_error());
            }
                }
                else if($_SESSION['roleid']==1){
                    $user = $_SESSION['uid'];
                    $sql = "SELECT * FROM student WHERE userID = '$user'";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while($row = mysqli_fetch_assoc($result)){
                        $today = date("Y-m-d");
                        $age = date_diff(date_create($row['DOB']), date_create($today));
                        echo '<div class="container">
                                <h3>Gender: '.$row['gender'].'</h3>
                                <p>Age: '.$age->format('%y').'</p>
                                <p>Sport: '.$row['sport'].'</p>
                                <p>Training Level: '.$row['trnglevel'].'</p>

                            </div>';
                        //die(mysqli_error());
                    }
                }
            }
            ?>
            
        </small>
        <form action="updateprofile.php">
            <button type="button-submit" name="update-profile" id="submit" class="btn btn-primary form-submit">Edit Profile</button>
        </form>
        </div>
        </div>
    </h3>

    <style type = "text/css">
        .profiletext{
            position:absolute;
            left:20%;
            margin-top:30px;
        }
    </style>
</body>