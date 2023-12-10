<?php 

require "core/init.php"; 
$title = "Login";

?>

<?php require "includes/header.php"; ?>
<script src="assets/js/login.js"></script>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <?php require "includes/banner.php"; ?>

    <div class="login">
        <h1>Login</h1>
        <form action="modules/login.module.php" id="user-login-form" method="post">
            <div class="form-input">
                <input type="email" id="email" name="email" placeholder="Enter email here" autocomplete="on" required>
            </div>
            <p class="email-error input-error hide"></p>
            <div class="form-input">
                <input type="password" id="password" name="password" placeholder="Enter password here" required>
            </div>
            <p class="password-error input-error hide"></p>
            <button id="user-login" type="submit"><div></div>Login</button>
        </form>

        <?php require "includes/footer.php"; ?>
        
    </div>
    
</body>
</html>