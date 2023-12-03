<?php
    require "init.php"; 

    if(!empty($_SESSION["user_data"])) {
        unset($_SESSION['user_data']);
        message('Logout was successful!');
        redirect("login.php");
    }
?>
