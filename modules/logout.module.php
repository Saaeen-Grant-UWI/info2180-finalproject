<?php
    require "../core/init.php"; 

    if(!empty($_SESSION["user_data"])) {
        unset($_SESSION['user_data']);
        redirect("login.php");
    } else {
        redirect("login.php");
    }
?>
