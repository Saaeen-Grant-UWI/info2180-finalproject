<?php 

require "core/init.php"; 
$title = "New Contact";

?>

<?php require "includes/header.php"; ?>
</head>
<body>

<script>
    $(document).ready(function(){

        $("#contact-submit").click(function(e){
            e.preventDefault()
            const form_data = $("#add-contact-form").serializeArray()
            $(".contact-add-success").addClass("hide")

            $.ajax({
                type: "POST",
                url: "modules/addcontact.module.php",
                data: form_data,
                success: function(data) {
                    let error_data = JSON.parse(data)
                    $(".input-error").addClass("hide")
                    for(error in error_data) {
                        $(`.${error}-error`).html(error_data[error])
                        $(`.${error}-error`).removeClass("hide")
                    }

                    if(jQuery.isEmptyObject(error_data)) {
                        $("#add-contact-form").trigger("reset")
                        $(".contact-add-success").removeClass("hide")    
                          
                    }

                },
                error: function(data) {}
            })

        })
    })
</script>


<?php if (is_loggedin()) {?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <h1>New Contact</h1>
        <div class="content-container">
            <div class="contact-add-success hide">Sucessfully Added New Contact</div>
            <form action="" id="add-contact-form" method="post">
                
                <div class="input-container">
                    <label for="title">Title</label>
                    <select name="title" id="title-select">
                        <option name="member">Mr</option>
                        <option name="admin">Mrs</option>
                        <option name="admin">Ms</option>
                        <option name="admin">Dr</option>
                        <option name="admin">Prof</option>
                    </select>
                </div>

                <div class="input-container">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname">
                    <p class="firstname-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname">
                    <p class="lastname-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <p class="email-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="telephone">Telephone</label>
                    <input type="text" name="telephone">
                    <p class="telephone-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="company">Company</label>
                    <input type="text" name="company">
                    <p class="company-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="type">Type</label>
                    <select name="type" id="type-select">
                        <option name="sales lead">Sales Lead</option>
                        <option name="support">Support</option>
                    </select>
                </div>

                <div class="input-container">
                    <label for="assigned_to">Assigned To</label>
                    <select name="assigned_to" id="assignment-select">
                        <?php foreach (get_all("users") as $row){?>
                            <option><?= $row['firstname']." ".$row['lastname'] ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="input-container">
                    <button id="contact-submit" type="submit">Save</button>
                </div>

            </form>
        </div>
        <?php require "includes/footer.php"; ?>
    </div>
<?php } else { ?> 
    <?php require "includes/warning.php"; ?>
<?php } ?> 

</body>
</html>