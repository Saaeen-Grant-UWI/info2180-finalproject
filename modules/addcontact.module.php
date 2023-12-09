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
            insert("contacts", [$_POST["title"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["telephone"], $_POST["company"], $_POST["type"], users_id_by_name($_POST["assigned_to"]), user_info("id"), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        }

    }   
}
echo json_encode($errors);
?>