<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <form action="" method="POST">

        <table class="tbl-30">
            
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
            
            </tr>

            <tr>

                <td>User Name:</td>
                <td>
                    <input type="text" name="username" placeholder="Enter your username">
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Enter your Paasword"> 
                </td>
            </tr>

            <tr>
                <td colspan="2" >
                    <input type="Submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
    </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php  
  //process the value from form and save it in database
  if(isset($_POST['submit']))
  {
      
     //get the data from form
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password = md5($_POST['password']);

     //sql query tp save the data into database
     $sql = "INSERT INTO tbl_admin SET
       full_name='$full_name',
       username='$username',
       password='$password'
     ";

     
    //executing query and saving data into database
     $res = mysqli_query($conn,$sql) or die(mysqli_error());

     // check weather the query is excuted or not
     if($res==TRUE)
     {
        //create a session variable to display Message
        $_SESSION['add'] = "Admin Added sucessfully";


        //redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
     }
     else{
         //failed to inster data
        //create a session variable to display Message
        $_SESSION['add'] = "failed to add admin";


        //redirect page to manage admin
        header("location:".SITEURL.'admin/add-admin.php');
  }
}

?>