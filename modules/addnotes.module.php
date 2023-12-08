<?php 

require "../core/init.php"; 

$where = [];
$errors = [];

if(!empty($_SESSION["current_contact"])) {
            
    $where = get_where("notes", ["contact_id", $_SESSION["current_contact"]["id"]]);
            
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    
    if(!empty($_POST["note"])) {
        if(!empty($_SESSION["current_contact"])) {
            insert("notes", [$_SESSION["current_contact"]["id"], $_POST["note"], user_info("id"), date('Y-m-d H:i:s')]);
            $where = get_where("notes", ["contact_id", $_SESSION["current_contact"]["id"]]);
            
        } 
        
        
    } else {
        
        $errors['note'] = "please enter a note!";
        
    }

}



?>


<?php foreach ($where as $row) { ?>
    <div class="note">
        <p class="title"><?= users_name_by_id($row["created_by"])?></p>
        <p class="body"><?= $row["comment"]?></p>
        <p class="date"><?= date('F d, Y', strtotime($row["created_at"]))?></p>
    </div>
<?php }?>