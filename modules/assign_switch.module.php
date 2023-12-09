<?php

require "../core/init.php"; 


if(!empty($_SESSION["current_contact"])) {
    
        
        if(array_key_exists("action", $_GET)) {
            
            switch($_GET['action']){
                case "assign-to":
                    update("contacts",["assigned_to", user_info("id"), $_SESSION["current_contact"]["id"]]); 
                    break;
                case "switch-to-support":
                    update("contacts",["type", "Support", $_SESSION["current_contact"]["id"]]); 
                    break;
                case "switch-to-sales":
                    update("contacts",["type", "Sales Lead", $_SESSION["current_contact"]["id"]]); 
                    break;
                case "updated-at":
                    update("contacts",["updated_at", date('Y-m-d H:i:s'), $_SESSION["current_contact"]["id"]]); 
                break;
            }
                        
        }    
    
    $where = get_where("contacts", ["id", $_SESSION["current_contact"]["id"]])[0];
}


?>
<?php if($_GET['action'] == "assign-to") {?>
    <p id="assigned-user"><?= users_name_by_id(user_info("id"))?></p>
<?php } else if($_GET['action'] == "updated-at") { ?>
    <p id="updated-at">Updated on <?= date('F j, Y', strtotime($where["updated_at"])) ?></p>
<?php } else { ?>
    <?php if($where["type"]=="Sales Lead") { ?>
        <a href="#" id="switch" class="switch-to-support" >
            <span><img src="assets/images/switch-light.svg"  width="32px" alt=""></span>
            Switch to Support
        </a>
    <?php } else { ?>
        <a href="#" id="switch" class="switch-to-sales" >
            <span><img src="assets/images/switch.svg"  width="32px" alt=""></span>
            Switch to Sales Lead
        </a>
    <?php } ?>
<?php } ?>

