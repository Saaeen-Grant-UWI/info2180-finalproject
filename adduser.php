<?php 

require "core/init.php"; 
$title = "Add User";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {

        $result = get_where("users",["email",$_POST["email"]]);
        $user = empty($result)? []: $result[0];
    
        if($user) { 
            $password = $user["password"];
            if($password == $_POST["password"]) {
                $_SESSION["user_data"] = $user;
                message("Login was successful!");
                redirect("dashboard.php");
                
            } else {
                $erros['password'] = "password wrong asl!!";
            }
        } else {
            $erros['email'] = "email not found!!";
        }
    } else {
        $erros['email'] = "enter email";
    }
    
}

?>

<?php require "includes/header.php"; ?>
</head>
<body>
    
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <h1>New User</h1>
        
        <div class="content-container">
            <form action="" id="add-user-form" method="post">

                <div class="input-container">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name">
                </div>

                <div class="input-container">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name">
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
                    <label for="roles">Roles</label>
                    <select name="roles" id="role-select">
                        <option name="member">Member</option>
                        <option name="admin">Admin</option>
                    </select>
                </div>

                <div class="input-container">
                    <button type="submit">Save</button>
                </div>
                
            </form>
        </div>

        <?php require "includes/footer.php"; ?>

    </div>

</body>
</html>