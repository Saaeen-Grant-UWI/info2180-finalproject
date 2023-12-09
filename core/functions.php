<?php

function redirect($page) {
    header("Location: http://localhost/info2180-finalproject/".$page);
    die;
}

function is_loggedin() {
    if (!(empty($_SESSION['user_data']))){
        return true;
    }
    return false;
}

function is_admin() {
    if(array_key_exists('user_data',$_SESSION)) {
        if ($_SESSION['user_data']['role'] === "Admin"){
            return true;
        }
    }
    return false;
}

function user_info($info) {
    if(array_key_exists('user_data',$_SESSION)) {
        return $_SESSION['user_data'][$info];
    }
    return false;
}

function users_id_by_name($name) {
    $split_name = preg_split("/ /",$name);
    $retval = 0;
    foreach (get_all("users") as $row){
        if(($split_name[0]===$row["firstname"])&&($split_name[1]===$row["lastname"])) {
            $retval = $row["id"];
        }
    }
    
    return $retval;
}

function users_name_by_id($id) {
    $retval = "";
    $result = get_where("users", ["id",$id]);
    if(!empty($result)) {
        $retval = $result[0]["firstname"]." ".$result[0]["lastname"];
    }

    return $retval;
}


?>