<?php 

require "core/init.php"; 
$title = "Login";

?>

<?php require "includes/header.php"; ?>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<script>
$(document).ready(function(){
    $("#user-login").click(function(e){
        e.preventDefault()
        const form_data = $("#user-login-form").serializeArray()

        $.ajax({
            type: "POST",
            url: "modules/login.module.php",
            data: form_data,
            success: function(data) {
                let error_data = JSON.parse(data)
                $(".input-error").addClass("hide")
                for(error in error_data) {
                    $(`.${error}-error`).html(error_data[error])
                    $(`.${error}-error`).removeClass("hide")
                }
                
                if(jQuery.isEmptyObject(error_data)) {
                    window.location.href = "dashboard.php"
                }
                
            },
            error: function(data) {}
        })
        
    })
})
</script>

    <?php require "includes/banner.php"; ?>

    <div class="login">
        <h1>Login</h1>
        <form action="modules/login.module.php" id="user-login-form" method="post">
            <div class="form-input"><input type="email" name="email" placeholder="Enter email here" ></div>
            <p class="email-error input-error hide"></p>
            <div class="form-input"><input type="password" name="password" placeholder="Enter password here"></div>
            <p class="password-error input-error hide"></p>
            <button id="user-login" type="submit"><div></div>Login</button>
        </form>

        <?php require "includes/footer.php"; ?>
        
    </div>
    
</body>
</html>