<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="shortcut icon" href="#" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <title>SportsConnectHomePage</title>
</head>

<body>
  <!--bootstrap framework-->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="main.php">
      <img alt="Brand" src="images/SportsConnect_Logo.png" width="100" class="img-fluid" alt="responsive image">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--search bar-->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
            <input class="form-control mr-sm-2" type="text" name="sport-search" placeholder="Sport">
            <input class="form-control mr-sm-2" type="text" name="location-search" placeholder="Location">
            <button class="btn btn-outline-success my-2 my-sm-0" name="submit-search" type="submit">Search</button>
          </form>
          <!--end of searchbar-->
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="btn btn-light-primary" href="main.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-light-primary" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-light-primary" href="browse.php">Browse</a>
        </li>
        <?php 
           if(isset($_SESSION['uid'])){
             //if it is a coach account, show class dropdown menu
             if($_SESSION['roleid']==2){
              echo
              '<div class="dropdown">
                <button class="btn btn-primary-light dropdown-toggle-default" type="button" data-toggle="dropdown">Class
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="viewclass.php">Manage Classes</a></li>
                  <li><a class="dropdown-item" href="class.php">Create New Class</a></li>
                </ul>         
              </div>
              <li class="nav-item">
           <form action="viewprofile.php">
            <button type="submit" class="btn btn-light-primary" name="profile-submit">Profile</a>
           </form>
          </li>';
             }

             if($_SESSION['roleid']==1){
               echo'
              <li class="nav-item">
           <form action="viewprofile.php">
            <button type="submit" class="btn btn-light-primary" name="profile-submit">Profile</a>
           </form>
          </li>';
             }
             //both coach and student account can view the profile and logout buttonss
            echo
            '
          <li class="nav-item">
          <form action="includes/logout.inc.php" method="POST">
            <button type="submit" class="btn btn-light-primary" name="logout-submit">Logout</a>
           </form>
           </li>';
           
          }
          //if not logged in, show login and signup button
          else{
            echo'<li class="nav-item">
            <form action="login.php" method="POST">
              <button type="submit" class="btn btn-light-primary" name="login-submit">Login</a>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
          </li>';
          }
        ?>       
      </ul>
    </div>
  </nav>

  <!-- banner layout  -->
  <div class="banner">
    <img src="images/BannerDesign@2x.png" id="banner" width=100%>
  </div>
</body> 