<?php 

require "core/init.php"; 
$title = "Login"

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
            <button type="button"><img src="assets/images/lock.svg" width="32px" alt=""><span>Login</span></button>
        </form>
        <?php require "includes/footer.php"; ?>
    </div>
    
</body>
</html>