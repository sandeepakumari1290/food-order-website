<?php  include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Add Category</h1>
        <br><br>

        <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>
        <br><br>

        <!-- Add Category feom starts -->
        <form action="" method="POST" enctype="multipart/form-data" >

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="category Ttitle">
                    </td>

                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add-category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add Category feom starts -->

        <?php

        //check whather the submit is clicked or not
        if(isset($_POST['submit']))
        {
            //echo"clicked";
            // get the value from category form
            $title = $_POST['title'];

            //for radio input type , we need to check wheater the button is selected or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }

            //check image is selected or notand set the value for image name
            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name'];

                // Auto rename our image
                //get the extension of our image
                $ext = end(explode('.',$image_name));

                //rename the image
                $image_name = "Food_Category_".rand(000,999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/category/".$image_name;

                //upload the image
                $upload = move_uploaded_file($source_path,$destination_path);

                //check wheather the image is uploaede or not
                if($upload==false)
                {
                    $_SESSION['upload'] = "Failed to upload image.";

                    header('location:'.SITEURL.'admin/add-category.php');

                    //stop the process
                    die();
                }
            }
            else
            {
                $image_name="";
            }
            

            //sql query to insert category into database
            $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    ";

            //excute the query
            $res = mysqli_query($conn,$sql);

            //check the query executed or not
            if($res==TRUE)
            {
                $_SESSION['add']="Category Added Successfully.";

                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                $_SESSION['add']="Failed To Add Category.";

                header('location:'.SITEURL.'admin/manage-category.php');
            }

        }

        ?>
    </div>
</div>







<?php  include('partials/footer.php'); ?>