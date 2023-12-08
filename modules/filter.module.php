<?php
 
$result = [];

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['filter'])){
        switch($_GET['filter']){
            case "all":
                $result = get_all("contacts");
                break;
            case "sl":
                $result = get_where("contacts", ["type", "sales lead"]);
                break;
            case "support":
                $result = get_where("contacts", ["type", "support"]);
                break;
            case "atm":
                $result = get_where("contacts", ["assigned_to", user_info("id")]);
                break;
        }
        print_r($result);
    }
}