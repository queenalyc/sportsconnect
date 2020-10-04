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
        <h1 class="bannertext2">Edit Class</h1>
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
    <?php 
        if(isset($_SESSION['uid'])){
            if($_SESSION['roleid']==2){
                $classid = $_GET['class_id'];
                $sql = "SELECT * FROM class WHERE classID = '$classid'";

                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                echo' 
                <form action="includes/updateclass.inc.php" method="POST" id="class-form" class="form-horizontal"> <!--change this part-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="coachname"> <br> Coach Name:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="coachnameid" style="text-transform: capitalize;" value = "'.$row['coach_name'].'" placeholder="Coach Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sport">Sport:</label>
                        <div class="col-sm-10">       
                        <input type="text" class="form-control" name="sportid" style="text-transform: capitalize;" value = "'.$row['sport'].'" placeholder="Sport"/>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="trainingSelect">Training Level:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="levelid">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="location">Location:</label>
                        <div class="col-sm-10">       
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="locationid" value = "'.$row['location'].'" placeholder="Location"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="day">Day of class:</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="dayid">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-sm-2" for="input_time">Time (12 HR):</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control timepicker timepicker" name="timeid" id="input_time" value = "'.$row['time'].'" placeholder="Select Class Time">
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rate"><br>Rate/Hr:</label>
                        <div class="col-sm-10">
                            <div class="input-group"> 
                                <span class="input-group-addon">$</span>   
                                <input type="number" min="1" step="0.01" data-number-to-fixed="2" class="form-control currency" name="rateid" value = "'.$row['rate'].'" placeholder="Rate/Hr"/>
                            </div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="size">Class size:</label>
                        <div class="col-sm-10">       
                        <input type="number" class="form-control" name="sizeid" value = "'.$row['class_size'].'" placeholder="Class Size"/>
                        </div>
                    </div>
                    <input type="hidden" name="class-id" value="'.$row['classID'].'">
                    <div class="form-group">
                        <button type="button-submit" name="update-class-submit" class="btn btn-primary form-submit" >Edit Details</button>
                    </div>
                </form>
                ';
                echo $row['classID'];
                }
            }
        }
    ?>
    </div>
</body>