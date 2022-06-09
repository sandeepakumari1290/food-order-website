<?php
  include('../config/constants.php');


  //get the id to be deleted
  $id = $_GET['id'];

  //create sql query to delete Admin
  $sql = "DELETE FROM tbl_admin WHERE id=$id";

  //execute the query
  $res = mysqli_query($conn,$sql);

  if($res==TRUE)
  {
        $_SESSION['delete'] = "Admin Deleted Successfully";

        //redirecting to     
        header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else
  {
        $_SESSION['delete'] = "Failed to delete Admin try again later";

        header('location:'.SITEURL.'admin/manage-admin.php');
  }

  

?>