<?php
   include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the image
    if($image_name !="")
    {
        $path = "../images/category/".$image_name;

        $remove = unlink($path);

        if($remove==false)
        {
            $_SESSION['remove'] = "Failed to Remove Category Image";

            header('location:'.SITEURL.'/admin/manage-category.php');

            die();
        }
    }

    //delete data from database
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    $res = mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = "Category Deleted sucessfully";

        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else
    {
        $_SESSION['delete'] = "Failed to Delete Category ";

        header('location:'.SITEURL.'admin/manage-category.php');
    }
    
}
else
{
    header('location:'.SITEURL.'admin/manage-category.php');
}

?>