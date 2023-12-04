<?php 

require "core/init.php"; 
$title = "Users"

?>

<?php require "includes/header.php"; ?>
</head>
<body>
<?php if (is_loggedin()) {?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <div class="page-title">
            <h1>Users</h1> 
            <a href="adduser.php"><span><img src="assets/images/add.svg" width="32px" alt=""></span>Add User</a>
        </div>
        <div class="content-container">
             <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="width: 15%;">Role</th>
                    <th>Created</th>
                </tr>
                <?php if (is_admin()) { ?>
                    <?php if (empty(get_all("users"))) { ?>
                        <tr>
                            <td colspan="100%" style="text-align: center;">
                                <p class="table-warning" >No users found</p>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach (get_all("users") as $row){?>
                            <tr>
                                <td><?= $row['firstname']." ".$row['lastname'] ?></td>
                                <td><?= $row['email']?></td>
                                <td><?= ucfirst($row['role'])?></td>
                                <td><?= $row['created_at']?></td>
                            </tr>
                        <?php }?>
                    <?php }?>
                <?php } else {?>
                    <tr>
                        <td colspan="100%" style="text-align: center;">
                            <p class="table-warning" >Must be <span>Admin</span> to view users</p>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <?php require "includes/footer.php"; ?>
        
    </div>
<?php } else { ?> 
    <?php require "includes/warning.php"; ?>
<?php } ?> 

</body>
</html>