<?php 

require "core/init.php"; 
$title = "New User";


?>

<?php require "includes/header.php"; ?>
</head>
<body>

<script>
    $(document).ready(function(){
        $("#user-submit").click(function(e){
            e.preventDefault()
            // let error_count = 0;
            // let erros_messages = {}
            const form_data = $("#add-user-form").serializeArray()
            $(".user-add-success").addClass("hide")

            // for(item in form_data) {
            //     if(form_data[item].value == "") {
            //         error_count++
                    
            //         if(form_data[item].name == "firstname") {
            //             erros_messages[form_data[item].name] = "first name required *"
            //         } else if(form_data[item].name == "lastname") {
            //             erros_messages[form_data[item].name] = "first name required *"
            //         } else {
            //             erros_messages[form_data[item].name] = form_data[item].name+" is required *"
            //         }

            //     } else { 

            //         $(`.${form_data[item].name}-error`).addClass("hide") 
            //         $(`.${form_data[item].name}-error`).removeClass("input-error") 
            //     }
            // }

        //    if(error_count == 0) {
                $.ajax({
                    type: "POST",
                    url: "adduser.php",
                    data: form_data,
                    success: function(data) {
                       console.log(data)
                    },
                    error: function(data) {}
                })
        //    } else {
        //         for(item in erros_messages) {
        //             $(`.${item}-error`).removeClass("hide")
        //             $(`.${item}-error`).addClass("input-error")
        //             $(`.${item}-error`).html(erros_messages[item])
        //         }
        //    }
        })
    })
</script>

<?php if (is_loggedin()) {?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <?php require "includes/message.php"; ?>
        <h1>New User</h1>
        <div class="content-container">
            <?php if(is_admin()) {?>
                <div class="user-add-success hide"></div>
                <form action="adduser.php" id="add-user-form" method="post">

                    <div class="input-container">
                        <label for="firstname">First Name</label>
                        <input type="text" class="add-user-input" name="firstname">
                        <p class="firstname-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="add-user-input" name="lastname">
                        <p class="lastname-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" class="add-user-input" name="email">
                        <p class="email-error hide"></p>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="text" class="add-user-input" name="password">
                        <p class="password-error hide"></p>
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