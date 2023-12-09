<?php 

require "core/init.php"; 
$title = "New User";


?>

<?php require "includes/header.php"; ?>
<script src="assets/js/adduser.js"></script>
</head>
<body>

<?php if (is_loggedin()) {?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <h1>New User</h1>
        <div class="content-container">
            <?php if(is_admin()) {?>
                <div class="user-add-success hide">Sucessfully Added New User</div>
                <form action="adduser.php" id="add-user-form" method="post">

                    <div class="input-container">
                        <label for="firstname">First Name</label>
                        <input type="text" class="add-user-input" name="firstname">
                        <p class="firstname-error input-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="add-user-input" name="lastname">
                        <p class="lastname-error input-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" class="add-user-input" name="email">
                        <p class="email-error input-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="text" class="add-user-input" name="password">
                        <p class="password-error input-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="role">Roles</label>
                        <select name="role" id="role-select">
                            <option name="member">Member</option>
                            <option name="admin">Admin</option>
                        </select>
                    </div>

                    <div class="input-container">
                        <button id="user-submit" type="submit">Save</button>
                    </div>
                    
                </form>
            <?php } else { ?>
                <p class="form-warning">
                    Must be <span>Admin</span> to add users
                </p>
            <?php } ?>
        </div>

        <?php require "includes/footer.php"; ?>

    </div>
<?php } else { ?> 
    <?php require "includes/warning.php"; ?>
<?php } ?> 

</body>
</html>