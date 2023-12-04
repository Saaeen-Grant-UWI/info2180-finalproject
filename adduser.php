<?php 

require "core/init.php"; 
$title = "New User";
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {

        foreach (array_keys($_POST) as $key=> $value) {
            if(empty($_POST[$value])) {
                $errors[$value] = $value." is required!";
            }
        }

        if(empty($errors)) {
            insert("users", [$_POST["firstname"], $_POST["lastname"], $_POST["password"], $_POST["email"], strtolower($_POST["role"]), date('Y-m-d H:i:s')]);
            message("Successful added new user!");
            redirect("adduser.php");
        }

    }   
}


?>

<?php require "includes/header.php"; ?>
</head>
<body>

<?php if (is_loggedin()) {?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <?php require "includes/message.php"; ?>
        <h1>New User</h1>
        <div class="content-container">
            <?php if(is_admin()) {?>
                <form action="" id="add-user-form" method="post">

                    <div class="input-container">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname">
                    </div>

                    <div class="input-container">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname">
                    </div>

                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="text" name="password">
                    </div>

                    <div class="input-container">
                        <label for="role">Roles</label>
                        <select name="role" id="role-select">
                            <option name="member">Member</option>
                            <option name="admin">Admin</option>
                        </select>
                    </div>

                    <div class="input-container">
                        <button type="submit">Save</button>
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