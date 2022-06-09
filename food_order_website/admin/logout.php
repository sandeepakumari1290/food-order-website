<?php

include('../config/constants.php');

    //delete the session
    SESSION_destroy();

    header('location:'.SITEURL.'admin/login.php');

?>