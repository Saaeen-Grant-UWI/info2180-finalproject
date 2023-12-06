<?php

require "../core/init.php"; 

$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {

        foreach (array_keys($_POST) as $key=> $value) {
            if(empty($_POST[$value])) {
                $errors[$value] = $value." is required!";
            }
        }

        if(empty($errors)) {
            insert("users", [$_POST["firstname"], $_POST["lastname"], $_POST["password"], $_POST["email"], strtolower($_POST["role"]), date('Y-m-d H:i:s')]);
        }

    }   
}


echo json_encode($errors);
?>