'<?php  

  //start session
  SESSION_start();


  define('SITEURL','http://localhost/food_order_website/');

   //execute query and set data in database
   $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); // database connection
   $db_select = mysqli_select_db($conn,'food-order') or die(mysqli_error()); //selecting database


?>'