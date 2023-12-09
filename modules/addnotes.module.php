<?php 

require "../core/init.php"; 

$where = [];
$errors = [];

if(!empty($_SESSION["current_contact"])) {
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        
        
        if(!empty($_POST["note"])) {
            insert("notes", [$_SESSION["current_contact"]["id"], $_POST["note"], user_info("id"), date('Y-m-d H:i:s')]);
                        
        } else {
            
            $errors['note'] = "please enter a note!";
            
        }

    }    
    
    $where = get_where("notes", ["contact_id", $_SESSION["current_contact"]["id"]]);
}



?>


<?php foreach ($where as $row) { ?>
    <div class="note">
        <p class="title"><?= users_name_by_id($row["created_by"])?></p>
        <p class="body"><?= $row["comment"]?></p>
        <p class="date"><?= date('F d, Y', strtotime($row["created_at"]))?></p>
    </div>
<?php }?>