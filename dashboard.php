<?php 

require "core/init.php"; 
$title = "Dashboard";

?>

<?php require "includes/header.php"; ?>
</head>
<body>
<?php if (is_loggedin()) { ?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <div class="page-title">
            <h1>Dashboard</h1>
            <a href="addcontact.php"><span><img src="assets/images/add.svg"  width="32px" alt=""></span>Add Contact</a>
        </div>
        <div class="content-container">

            <div class="filter-container">

                <div class="filter-text">
                    <img src="assets/images/filter.svg" alt="" width="32px" srcset="">
                    <p>Filter By:</p>
                </div>

                <ul class="filter-options">
                    <li><a href="#">All</a></li>
                    <li><a href="#">Sales leads</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Assigned to me</a></li>
                </ul>

            </div>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                    <th></th>
                </tr>
                <?php if (empty(get_all("contacts"))) { ?>
                    <tr>
                        <td colspan="100%" style="text-align: center;">
                            <p class="table-warning" >No contacts found</p>
                        </td>
                    </tr>
                <?php } else { ?>
                    <?php foreach (get_all("contacts") as $row){?>
                        <tr>
                            <td><a href="#"><?= $row['firstname']." ".$row['lastname'] ?></a></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['company']?></td>
                            <td><span class="<?=str_replace(" ","-",$row['type'])?>"><?= $row['type']?></span></td>
                            <td><a href="#">view</a></td>
                        </tr>
                    <?php }?>
                <?php }?>
            </table>

        </div>
        <?php require "includes/footer.php"; ?>

    </div>

<?php } else { ?> 
    <?php require "includes/warning.php"; ?>
<?php } ?> 

</body>
</html>