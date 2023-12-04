<?php 

require "core/init.php"; 
$title = "New Contact";
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {

        foreach (array_keys($_POST) as $key=> $value) {
            if(empty($_POST[$value])) {
                $errors[$value] = $value." is required!";
            }
        }

        if(empty($errors)) {
            insert("contacts", [$_POST["title"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["telephone"], $_POST["company"], strtolower($_POST["type"]), users_id_by_name($_POST["assigned_to"]), user_info("id"), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
            message("Successful added new contact!");
            redirect("addcontact.php");
        }

    }   
}



?>

<?php require "includes/header.php"; ?>
</head>
<body>
<?php if (is_loggedin()) {?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <?php require "includes/message.php"; ?>
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
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname">
                </div>

                <div class="input-container">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname">
                </div>

                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>

                <div class="input-container">
                    <label for="telephone">Telephone</label>
                    <input type="text" name="telephone">
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
                    <label for="assigned_to">Assigned To</label>
                    <select name="assigned_to" id="assignment-select">
                        <?php foreach (get_all("users") as $row){?>
                            <option><?= $row['firstname']." ".$row['lastname'] ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="input-container">
                    <button type="submit">Save</button>
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