<?php
    include_once 'includes/dbh.inc.php';
    require "index.php";
?>
<body>

<div class="container-md mt-3">
<h4>Recent Classes </h4>
<div class="col-md-10">
<div class="row"> 

    <?php
        $sql = "SELECT * FROM class";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck>0){
            while($row=mysqli_fetch_assoc($result)){ 
                $time = new DateTime($row['time']);?>
                <div class="col-md-4">     
                        <div class="card bg-light mb-3">
                        <div class="card-header" style="text-transform: capitalize;"><?php echo $row['coach_name']; ?></div>
                             <div class="card-body" >
                               <h6 class="card-subtitle mb-2 text-muted" style="text-transform: capitalize;" > <?php echo $row['sport']; ?> </h6>
                                <p class="card-text" style="text-transform: capitalize;">Level: <?php echo $row['trng_level']; ?><br>
                                Location: <?php echo $row['location']; ?><br>
                                Day of the class: <?php echo $row['day_class']; ?><br>
                                Class time: <?php echo $time->format('h:i A'); ?> <br>
                                Price of the class: $<?php echo $row['rate'];?> <br>
                                Maximum Class size: <?php echo $row['class_size'];?> </p>
                                <a href="#" class="card-link">Join Class</a>
                                 </div>
                             </div>
                         </div>
            <?php } ?>
        <?php } ?>
        </div>
    </div>
</div>
</body>
<?php
    require "footer.php";
?>