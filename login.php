<?php 

require "core/init.php"; 
$title = "Login";
$erros = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(!empty($_POST["email"])) {

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
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <?php require "includes/banner.php"; ?>

    <div class="login">
        <?php echo(message()); ?>
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-input"><input type="email" name="email" placeholder="Enter email here" ></div>
            <?php echo(!array_key_exists("email",$erros)? "": $erros['email'] ); ?>
            <div class="form-input"><input type="password" name="password" placeholder="Enter password here"></div>
            <?php echo(!array_key_exists("password",$erros)? "": $erros['password'] ); ?>
            <button type="submit"><div></div>Login</button>
        </form>

        <?php require "includes/footer.php"; ?>
        
    </div>
    
</body>
</html>