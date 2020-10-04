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
        <title> My Class </title>
        <h1 class="bannertext2">
            My Class
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
    <div class="container">
        <div class="row">
        <?php 
        if(isset($_SESSION['uid'])){
            if($_SESSION['roleid']==2){
                $coach = $_SESSION['coachid'];
                $sql = "SELECT * FROM class WHERE coachID = '$coach'";
                
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                    $classid = $row['classID'];
                echo '
                <div class="col-md-auto ">
                        <div class="card bg-light mb-3"">
                        <div class="card-header" style="text-transform: capitalize;">'.$row['coach_name'].'</div>
                            <div class="card-body">
                                    
                                    <h6 class="card-subtitle mb-2 text-muted" style="text-transform: capitalize;" >'.$row['sport'].'</h6>
                                    <p class="card-text" style="text-transform: capitalize;">Level: '.$row['trng_level'].'<br>
                                    Location: '.$row['location'].'<br>
                                    Day of the class: '.$row['day_class'].'<br>
                                    Class time: '.$row['time'].'<br>
                                    Price of the class: '.$row['rate'].'<br>
                                    Maximum Class size: '.$row['class_size'].'</p>
                                    
                                    <a href="updateclass.php?class_id='.$row['classID'].'" class="btn btn-primary">Edit Class</a>
                                    '.$row['classID'].'
                                </div>
                            </div>  
                        </div>
                ';
            }
        }
    }
    ?>
        </div>
    </div>    

    <style type = "text/css">
        .profiletext{
            position:absolute;
            left:20%;
            margin-top:30px;
        }
    </style>
</body>