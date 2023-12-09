<?php

require "../core/init.php"; 
$button_text = "";


if(!empty($_SESSION["current_contact"])) {
    
        
        if(array_key_exists("action", $_GET)) {
            
            switch($_GET['action']){
                case "0":
                    update("contacts",["assigned_to", user_info("id"), $_SESSION["current_contact"]["id"]]); 
                    break;
                case "1":
                    update("contacts",["type", "support", $_SESSION["current_contact"]["id"]]); 
                    $button_text = "Switch to Support";
                    break;
                case "2":
                    update("contacts",["type", "sales lead", $_SESSION["current_contact"]["id"]]); 
                    $button_text = "Switch to Sales Lead";
                    break;
            }
                        
        }    
    
    $where = get_where("contacts", ["id", $_SESSION["current_contact"]["id"]])[0];
}

?>
<?php if($_GET['action'] == "0") {?>
    <span><?=users_name_by_id(user_info("id"))?></span>
<?php } else { ?>
    <a href="#" id="switch" class="<?=$where["type"]=="sales lead"? "1":"2" ?>" ><span><img src="assets/images/switch.svg"  width="32px" alt=""></span>Switch to <?=$where["type"]!="sales lead"? ucwords("sales lead"):ucwords("support") ?></a>
<?php } ?>
