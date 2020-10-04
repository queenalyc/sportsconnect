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
            <h1 class="bannertext2">Classes</h1>
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
<div class="col-md-9">
<div class="row"> 
        <?php 
            if(isset($_POST['submit-search'])){
                //prevent sql injection make sure data get from user is safe
                $sportSearch = mysqli_real_escape_string($conn, $_POST['sport-search']);
                $locationSearch = mysqli_real_escape_string($conn, $_POST['location-search']);
                $sql = "SELECT * FROM class WHERE sport LIKE '%$sportSearch%' AND location LIKE'%$locationSearch%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);
                
                echo '<div class="container text-center"> <p><br>Showing '.$queryResult.' results for "'.$sportSearch.'" and "'.$locationSearch.'"<br> </p> </div>';
                if($queryResult > 0){
                    while($row = mysqli_fetch_assoc($result)){
        
                        echo '
                        <div class="col-md-auto">
                        <div class="card bg-light mb-3">
                        <div class="card-header" style="text-transform: capitalize;">'.$row['coach_name'].'</div>
                        <div class="card-body" >
                                                    
                        <h6 class="card-subtitle mb-2 text-muted" style="text-transform: capitalize;" >'.$row['sport'].'</h6>
                        <p class="card-text" style="text-transform: capitalize;">Level: '.$row['trng_level'].'<br>
                        Location: '.$row['location'].'<br>
                        Day of the class: '.$row['day_class'].'<br>
                        Class time: '.$row['time'].'<br>
                        Price of the class: $'.$row['rate'].'<br>
                        Maximum Class size: '.$row['class_size'].'</p>
                        <a href="#" class="card-link">Join Class</a>
                        </div>
                        </div>
                        </div>';
                    }
                } 
            }
        ?>
    </div>
    </div>
    </div> 
</body>
