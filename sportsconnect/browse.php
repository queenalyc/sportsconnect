<!-- Title: Product Filter Search with Ajax, PHP & MySQL
Author: PHPZAG Team
Date: 4 December, 2019
Code Version: 1.0
Availability: https://www.phpzag.com/product-filter-search-with-ajax-php-mysql/ -->
<?php
    include_once 'includes/dbh.inc.php';
    require "header.php";
?>
<script src="js/search.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<head>
    <div id="profile-container">
        <div class="container-fluid">
            <style> 
            .container-fluid{
            position: relative;
            }
            </style>
            <h1 class="bannertext2">Browse Classes</h1>
            <style type = "text/css">
                .bannertext2{
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
include 'class/Classes.php';
$classes = new Classes();
?>
        <div class="row py-md-4">
        <div class="col-md-3">
        <div class="list-group">
			<h4>Price</h4>	
			<div class="list-group-item">
                <input type="hidden" id="minPrice" value="0" />
                <input type="hidden" id="maxPrice" value="500" />
                <p id="priceRange">0 - 500</p>
                <div id="priceSlider"></div>                  
			</div>			
		</div> 
        <div class="list-group">
			<h4>Class Days</h4>
			<div class="daySection">
				<?php
				$day = $classes->getDay();
				foreach($day as $dayDetails){	
				?>
				<div class="list-group-item checkbox">
				<label><input type="checkbox" class="classDetail day" value="<?php echo $dayDetails["day_class"]; ?>"  > <?php echo $dayDetails["day_class"]; ?></label>
				</div>
				<?php }	?>
			</div>
		</div>
        <br>
        <div class="list-group">
			<h4>Training Level</h4>
			<div class="levelSection">
				<?php
				$day = $classes->getLevel();
				foreach($day as $levelDetails){	
				?>
				<div class="list-group-item checkbox">
				<label><input type="checkbox" class="classDetail level" value="<?php echo $levelDetails["trng_level"]; ?>"  > <?php echo $levelDetails["trng_level"]; ?></label>
				</div>
				<?php }	?>
			</div>
		</div>
        </div>
        <div class="col-md-9">
	 <br/>
		<div class="row searchResult">
		</div>

	</div>
    </div>
    </div>
</body>
