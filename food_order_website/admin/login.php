<?php include('../config/constants.php')  ?>


<html>
    <head>
        <title>Login Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
                <form action="" method="POST" class="text-center">
                    Username:<br>
                    <input type="text" name="username" placeholder="Enter User Name">
                    <br><br>
                    Password:<br>
                    <input type="text" name="password" placeholder="Enter Password">
                    <br><br>
                    <input type="submit" name="submit" valur="Login" class="btn-primary">
                </form>
                <br><br>
            <p class="text-center" >Created by - <a href="www.sandeepa.com">Sandeepa Kumari</a></p>

        
        </div>

    </body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        //process login form
        //get data from login
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         //query to check udername and password exits or not
         $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

         $res = mysqli_query($conn,$sql);

         //count rows to check wheather the user exists or not
         $count = mysqli_num_rows($res);

         if($count==1)
         {
            $_SESSION['login'] = "Login Sucessfully";

            $_SESSION['user'] = $username;


            header('location:'.SITEURL.'admin/');
         }
         else
         {
            $_SESSION['login'] = " Login Failed, Username And Password did not Matched";

            header('location:'.SITEURL.'admin/login.php');
         }
    }
?>