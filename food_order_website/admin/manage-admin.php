<?php  include('partials/menu.php'); ?>

        <!--Main content section starts-->
        <div class="main-content">
        <div class="wrapper">
                <h1 class="text-center">Manage Admin</h1>
                <br /><br /><br />

                <?php
                      if(isset($_SESSION['add']))
                      {
                              echo $_SESSION['add']; //displaying session message
                              unset($_SESSION['add']); //removing session message
                      }  
                      
                      if(isset($_SESSION['delete']))
                      {
                              echo $_SESSION['delete'];
                              unset($_SESSION['delete']);
                      }

                      if(isset($_SESSION['update']))
                      {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                      }
                ?>
                <br><br>
                <!-- Button to Add Admin-->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                        <tr>
                                <th> S.N.</th>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Actions</th>
                        </tr>


                        <?php
                           //for retrivind the data from admin
                            $sql = "SELECT * FROM tbl_admin";

                            //execute the query
                            $res = mysqli_query($conn,$sql);

                            //check wheather the query is executed or not
                            if($res == TRUE)
                            {
                                $count = mysqli_num_rows($res);

                                $sn=1;

                                 if($count>0)
                                    {   
                                        while($rows = mysqli_fetch_assoc($res))
                                        {

                                                $id = $rows['id'];
                                                $full_name=$rows['full_name'];
                                                $username=$rows['username'];

                                                ?>

                                                <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $full_name; ?></td>
                                                <td><?php echo $username;  ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"class="btn-secondary">Update </a>
                                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-third">Delete </a>
                                                </td>
                                                </tr>

                                                <?php
                                        }
                                    } 
                                    else
                                    {

                                    }
                                }                

                         ?>


                       
                </table>
                

            </div> 
        </div>
        <!--Main section section ends-->

<?php include('partials/footer.php') ?>