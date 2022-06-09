
<?php include('partials/menu.php');  ?>

        <!--Main content section starts-->
        <div class="main-content">
        <div class="wrapper">
                <h2 class="text-center">DASHBOARD</h2>
                <br><br>
                <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
               ?>
                <br><br>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    Categories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    Categories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    Categories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    Categories
                </div>

                <div class="clearfix"></div>

            </div> 
        </div>
        <!--Main section section ends-->

    <?php include('partials/footer.php') ?>    