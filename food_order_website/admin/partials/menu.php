<?php 
    include('../config/constants.php');

    include('login-check.php');
?> 



<html>
    <head>
        <title>Food Order Website Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!--Menu section starts-->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="<?php echo SITEURL;  ?>">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="<?php echo SITEURL;  ?>categories.php">Category</a></li>
                    <li><a href="<?php echo SITEURL; ?>foods.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li> 
                    <li><a href="logout.php">Logout</a></li>             
                </ul>        
            </div>    
        </div>
        <!--Menu section ends-->