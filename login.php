<?php 

require "core/init.php"; 
$title = "Login";

echo "<pre>";
var_dump($_POST);
echo "</pre>";



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = get_where("users",["email",$_POST["email"]]);
    $user = empty($result)? []: $result[0];
    if($user) { 
        $password = $user["password"];
        if($password == $_POST["password"]) {
            echo("logged in!!");
            $_SESSION["user_data"] = $user;
            $_SESSION["message"] = "Login was successful!";
            header("Location: http://localhost/info2180-finalproject/dashboard.php");

            
        } else {
            echo("password wrong asl!!");
        }
    } else {
        echo("email not found!!");
    }
    
}





?>

<?php require "includes/header.php"; ?>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <?php require "includes/banner.php"; ?>

    <div class="login">
        <h1>Login</h1>
        <a href="dashboard.php">see dashboard (temporary)</a>
        <form action="" method="post">
            <div class="form-input"><input type="email" name="email" placeholder="Enter email here" ></div>
            <div class="form-input"><input type="password" name="password" placeholder="Enter password here"></div>
            <button type="submit"><div></div>Login</button>
        </form>

        <?php require "includes/footer.php"; ?>
        
    </div>
    
</body>
</html>