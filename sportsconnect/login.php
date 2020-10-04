<?php
    require "header.php";
?>

<head>
    <div class="container-fluid">
            <style> 
            .container-fluid{
            position: relative;
            }
            </style>
            <h1 class="bannertext2">Login</h1>
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
    <section class="createProfile">
        <div class="container">
            <div class="class-content">
                <form action="includes/login.inc.php" method="POST" id="signup-form" class="signup-form">
                    <?php 
                    //error message
                        if(isset($_GET['error'])){
                            if($_GET['error'] == "incorrectpassword"){
                                echo'<p class="incorrectpassword"> <br> Your email or password is incorrect!</p>';
                            }
                            else if($_GET['error'] == "userdoesnotexist"){
                                echo'<p class="nosuchuser"> <br> User does not exist!</p>';
                            }
                        }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="email"> <br>Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" name="emailid" placeholder="Your Email"/>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password"> Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="pwdid" placeholder="Password"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="login-submit" id="submit" class="form-submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

<?php 
    require "footer.php"
?>