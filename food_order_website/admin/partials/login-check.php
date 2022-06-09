<?php  
    //check whather user login or not(Authorization)
    if(!isset($_SESSION['user']))//if user session isnot set i.e user not logged in
    {
        $_SESSION['no-login-message'] = "Please login to access to Admin panel.";

        header('location:'.SITEURL.'admin/login.php');
    }

?>