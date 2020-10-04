<?php
    require "header.php";
?>

<main>
<div class="container-fluid">
  <style> 
    .container-fluid{
      position: relative;
    }
  </style>
      <?php
        if(isset($_SESSION['uid'])){
          echo '            
          <div class="bannerText">
            <h1 class="bannertext">
              Discover the best coaches nationwide
            </h1>
            <button type="searchclassbtn" class="searchclassbtn">
              <a href="browse.php">Search For Classes</a>
          </button>
          <style type="text/css">
            button.searchclassbtn{
              position: absolute;
              left: 50%;
              margin-left: -70px;
              top:50%;
              margin-top:-90px;
            }
          </style>
          </div>
      </div>';
        }
        else{
          echo'            
          <div class="bannerText">
            <h1 class="bannertext">
              Discover the best coaches nationwide
            </h1>
            <button type="signupbtn" class="signupbtn">
              <a href="signup.php">Sign Up</a>
          </button>
          <style type="text/css">
            button.signupbtn{
              position: absolute;
              left: 50%;
              margin-left: -70px;
              top:50%;
              margin-top:-90px;
            }
          </style>
          </div>
      </div>
      ';
        }
      ?>
      
  </div>
</main>