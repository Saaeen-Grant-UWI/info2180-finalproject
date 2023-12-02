<?php 

require "core/init.php"; 
$title = "Dashboard"

?>

<?php require "includes/header.php"; ?>
</head>
<body>

    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <div class="page-title">
            <h1>Dashboard</h1>
            <a href="addcontact.php"><span><img src="assets/images/add.svg"  width="32px" alt=""></span>Add Contact</a>
        </div>
        <div class="content-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <?php require "includes/footer.php"; ?>
    </div>
    
</body>
</html>