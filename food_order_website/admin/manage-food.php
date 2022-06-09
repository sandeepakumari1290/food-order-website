<?php include('partials/menu.php'); ?>

<div class="main-content ">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br /><br />

                <!-- Button to Add Admin-->
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

                <br /><br /><br />

                <?php

                     if(isset($_SESSION['add']))
                     {
                             echo $_SESSION['add'];
                             unset($_SESSION['add']);
                     }   

                ?>

                <table class="tbl-full">
                        <tr>
                                <th> S.N.</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th>Actions</th>
                        </tr>

                        <?php

                           $sql = "SELECT * FROM tbl_food";

                           $res = mysqli_query($conn,$sql);

                           $count = mysqli_num_rows($res);

                           $sn=1;

                           if($count>0)
                           {
                              while($row=mysqli_fetch_assoc($res))
                              {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                
                                <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td>
                                        <?php 
                                            if($image_name=="")
                                            {
                                                echo "Image not added";
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"width="100px">
                                                <?php
                                            }
                                        
                                        ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                        <a href="#"class="btn-secondary">Update </a>
                                        <a href="#"class="btn-third">Delete </a>
                                </td>
                                </tr>


                                <?php


                              }    
                           }
                           else
                           {
                                echo "<tr> <td colspan='7'> Food not Added yet </td>  </tr>";
                           }

                        ?>
                       
                        
                </table>
                
    </div>
    
</div>

<?php include('partials/footer.php') ?>