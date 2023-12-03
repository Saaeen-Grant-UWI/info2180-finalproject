<?php

function redirect($page) {
    header("Location: http://localhost/info2180-finalproject/".$page);
    die;
}

function message($message = '') {

    if(!(empty($message))) {
         $_SESSION['message'] = $message;
    } else {
         if(!(empty($_SESSION['message']))) {
             $message = $_SESSION['message'];
             unset($_SESSION['message']);
             return $message;
         }
    }
    return false;
 }

function is_loggedin() {
    if (!(empty($_SESSION['user_data']))){
        return true;
    }
    return false;
}

?>