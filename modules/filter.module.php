<?php
require "../core/init.php"; 
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
    }
}
?>

<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Company</th>
    <th>Type</th>
    <th></th>
</tr>
<?php if(!empty($result)) { ?>
    <?php foreach ($result as $row){?>
        <tr>
            <td><a href="contact.php?contact=<?=$row["id"]?>" ><?= $row['title'].".".$row['firstname']." ".$row['lastname'] ?></a></td>
            <td><?= $row['email']?></td>
            <td><?= $row['company']?></td>
            <td><span class="<?=str_replace(" ","-",strtolower($row['type']))?>"><?= $row['type']?></span></td>
            <td><a href="contact.php?contact=<?=$row["id"]?>" >view</a></td>
        </tr>
    <?php }?>
<?php } else {?>
        <tr>
            <td colspan="100%" style="text-align: center;">
                <p class="table-warning" >Requested contacts not found</p>
            </td>
        </tr>
<?php } ?>
