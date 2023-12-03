<?php
    require "init.php"; 

    if(!empty($_SESSION["user_data"])) {
        unset($_SESSION);
        $_SESSION["message"] = "Logout was successful!";
        header("Location: http://localhost/info2180-finalproject/login.php");
    }
?>
