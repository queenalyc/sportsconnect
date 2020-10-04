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
            <h1 class="bannertext2">Create Account</h1>
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
                <form action="includes/signup.inc.php" method="POST" id="signup-form" class="signup-form">
                    <?php
                            //error message
                            if(isset($_GET['error'])){
                                if($_GET['error'] == "emptyfields"){
                                    echo'<p class="signuperror"> Please fill in all fields!</p>';
                                }
                                else if($_GET['error'] == "invalidmail") {
                                    echo'<p class="signuperror"> Invalid Email!</p>';
                                }
                                else if($_GET['error'] == "passwordcheck") {
                                    echo'<p class="signuperror"> Passwords do not match!</p>';
                                }
                            }
                            else if(isset($_GET['signup'])){
                                if($_GET['signup'] == "success"){
                                    echo'<p class="signupsucess"> Sign up success!</p>'; 
                                }
                            }
                        ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name"> <br> Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nameid" placeholder="Your Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email</label>
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
                        <label class="control-label col-sm-2" for="repassword">Re-password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="repwdid" placeholder="Confirm your password"/>
                        </div>
                    </div>
                
                    <div class="form-check-group">
                        <div class="col-sm-10">
                        <input type="radio" name="role" class="studentCheck" value="1"/>
                        <label for="studentCheck" class="label-studentCheck"><span><span></span></span>I'm a Student</label>
                        </div>
                    </div>
                    <div class="form-check-group">
                        <div class="col-sm-10">
                        <input type="radio" name="role" class="coachCheck" value="2"/>
                            <label for="coachCheck" class="label-coachCheck">I'm a Coach</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="signup-submit" id="submit" class="form-submit">Sign Up</button>
                    </div>
                </form>
                <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
            </div>
        </div>
    </section>
</body>

<?php 
    require "footer.php"
?>