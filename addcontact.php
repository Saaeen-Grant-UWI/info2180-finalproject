<?php 

require "core/init.php"; 
$title = "Add Contact"

?>

<?php require "includes/header.php"; ?>
</head>
<body>

    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <h1>New Contact</h1>
        <div class="content-container">
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
                    <label for="phone">Telephone</label>
                    <input type="text" name="phone">
                </div>

                <div class="input-container">
                    <label for="company">Company</label>
                    <input type="text" name="company">
                </div>

                <div class="input-container">
                    <label for="type">Type</label>
                    <select name="type" id="type-select">
                        <option name="sales lead">Sales Lead</option>
                        <option name="support">Support</option>
                    </select>
                </div>

                <div class="input-container">
                    <label for="assignment">Assigned To</label>
                    <select name="assignment" id="assignment-select">
                        
                    </select>
                </div>

            </form>
        </div>
        <?php require "includes/footer.php"; ?>
    </div>

</body>
</html>