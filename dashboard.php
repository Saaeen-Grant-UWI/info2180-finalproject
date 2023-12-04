<?php 

require "core/init.php"; 
$title = "Dashboard";

?>

<?php require "includes/header.php"; ?>
</head>
<body>

    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <?php
           echo(message());
        ?>
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
                <?php if (is_loggedin()) {?>
                    <?php if (empty(get_all("contacts"))) { ?>
                        <tr>
                            <td colspan="100%" style="text-align: center;">No contacts found</td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td>Mr.Dwight Shrute</td>
                            <td>dwight.shrute@paper.co</td>
                            <td>The Paper Company</td>
                            <td><span class="support" >support</span></td>
                            <td><a href="#">view</a></td>
                        </tr>
                    <?php }?>
                <?php }?>
            </table>

        </div>

        <?php require "includes/footer.php"; ?>
        
    </div>
    
</body>
</html>