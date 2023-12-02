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
                <tr>
                     <td>Ms.Jan Levinson</td>
                    <td>jan.levinson@paper.co</td>
                    <td>Member</td>
                    <td>2022-11-13 11:00</td>
                </tr>
                <tr>
                     <td>Ms.David Wallace</td>
                    <td>david.wallace@paper.co</td>
                    <td>Admin</td>
                    <td>2022-11-10 19:00</td>
                </tr>
            </table>
        </div>

        <?php require "includes/footer.php"; ?>
        
    </div>
    

</body>
</html>