<?php
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