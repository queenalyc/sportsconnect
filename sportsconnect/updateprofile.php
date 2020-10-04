<?php
    include_once 'includes/dbh.inc.php';
    require "header.php";
?>
<head>
    <div id="profile-container">
        <div class="container-fluid">
            <style> 
            .container-fluid{
            position: relative;
            }
            </style>
            <h1 class="bannertext2">Edit Profile</h1>
            <style type = "text/css">
                h1{
                    position:absolute;
                    left:20%;
                    margin-left: -70px;
                    margin-top:-100px;
                    font-size: 3vw;
                    color:white;
                }
            </style>
    </div>
</head>

<body>
    <div class="container">
        <?php 
            if(isset($_SESSION['uid'])){
                //if student user show student form
                if($_SESSION['roleid']==1){
                    $sql = "SELECT * FROM student WHERE userID ='".$_SESSION['uid']."'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo'<div class="student-content">
                    <form action="includes/updateprofile.inc.php" method="POST" id="profile-form"  enctype="multipart/form-data" class="profile-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="studentname"> <br> Student Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="studentnameid" style="text-transform: capitalize;" value = "'.$row['name'].'" placeholder="Student Name"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
                            
                            <div class="col-sm-10">       
                                <input type="date" class="form-control" name="dobid" value = "'.$row['DOB'].'"placeholder="Date of Birth"/>
                        </div> 
                        <div class="form-group" >
                            <label class="control-label col-sm-2" for="gender">Gender:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="genderid">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sport">Sport:</label>
                            <div class="col-sm-10">       
                            <input type="text" class="form-control" name="sportid" style="text-transform: capitalize;" value = "'.$row['sport'].'"placeholder="Sport"/>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-sm-2" for="level">Training Level:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="levelid">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <button type="button-submit" name="profile-submit-student" id="submit" class="btn btn-primary form-submit">Save Profile</button>
                        </div>
                    </form>
                </div>';
                }
                //if coach user show coach form
                if($_SESSION['roleid']==2){
                    $sql = "SELECT * FROM coach WHERE userID ='".$_SESSION['uid']."'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo'<div class="coach-content">
                    <form action="includes/updateprofile.inc.php" method="POST" id="profile-form"  enctype="multipart/form-data" class="profile-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="coachname"> <br> Coach Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="coachnameid" style="text-transform: capitalize;" value = "'.$row['name'].'" placeholder="Coach Name"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
                            
                            <div class="col-sm-10">       
                                <input type="date" class="form-control" name="dobid" value = "'.$row['DOB'].'"placeholder="Date of Birth"/>
                        </div> 
                        <div class="form-group" >
                            <label class="control-label col-sm-2" for="gender">Gender:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="genderid">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sport">Sport:</label>
                            <div class="col-sm-10">       
                            <input type="text" class="form-control" name="sportid" style="text-transform: capitalize;" value = "'.$row['sport'].'"placeholder="Sport"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="aboutme">About Me:</label>
                            <div class="col-sm-10">
                            <textarea id="w3mission" rows="6" cols="100" name="aboutmeid" placeholder="Give a short description about yourself">'.$row['description'].'</textarea>       
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button-submit" name="profile-submit-coach" id="submit" class="btn btn-primary form-submit">Save Profile</button>
                        </div>
                    </form>
                </div>';
                }
            }
        ?>
    </div>

</body>