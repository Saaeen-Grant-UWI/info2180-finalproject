<?php 

require "core/init.php"; 
$title = "Users"

?>

<?php require "includes/header.php"; ?>
</head>
<body>

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
                <?php if (is_loggedin()) {?>
                    <?php if (empty(get_all("users"))) { ?>
                        <tr>
                            <td colspan="100%" style="text-align: center;">No users found</td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach (get_all("users") as $row){?>
                            <tr>
                                <td><?= $row['firstname'].$row['lastname'] ?></td>
                                <td><?= $row['email']?></td>
                                <td><?= ucfirst($row['role'])?></td>
                                <td><?= $row['created_at']?></td>
                            </tr>
                        <?php }?>
                    <?php }?>
                <?php }?>
            </table>
        </div>

        <?php require "includes/footer.php"; ?>
        
    </div>
    

</body>
</html>