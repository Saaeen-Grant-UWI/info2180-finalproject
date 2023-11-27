<?php 

require "core/init.php"; 
$title = "Login"

?>

<?php require "includes/header.php"; ?>
</head>
<body>

    <?php require "includes/banner.php"; ?>

    <div class="login">
        <form action="" method="post">
            <input type="email" name="email">
            <input type="password" name="password">
            <button type="submit">Login</button>
        </form>
    </div>
    
    <?php require "includes/footer.php"; ?>
    
</body>
</html>