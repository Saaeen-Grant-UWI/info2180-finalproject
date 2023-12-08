<?php 
require "core/init.php"; 
require "modules/contact.module.php"; 

$title = "Contact";


?>

<?php require "includes/header.php"; ?>
<link rel="stylesheet" href="assets/css/contact.css">
<script src="assets/js/notes.js"></script>
</head>
<body>
<?php if (is_loggedin()) { ?>
    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">
        <?php if(empty($errors)) { ?>
            <div class="contact-info-container">
                
                <div class="page-title">
                    <div class="contact-title">
                        <div class="profile"></div>
                        <div class="title-info">
                            <h1><?= $requestedContact["title"].". ".$requestedContact["firstname"]." ".$requestedContact["lastname"]?></h1>
                            <p>Created on <?= date('F d, Y', strtotime($requestedContact["created_at"])) ?> by <?= users_name_by_id($requestedContact["created_by"])?></p>
                            <p>Updated on <?= date('F d, Y', strtotime($requestedContact["updated_at"])) ?></p>
                        </div>
                    </div>
                    <div class="title-button-container">
                        <a href="addcontact.php"><span><img src="assets/images/assign.svg"  width="32px" alt=""></span>Assign to me</a>
                        <a href="addcontact.php"><span><img src="assets/images/switch.svg"  width="32px" alt=""></span>Switch to Sales Lead</a>
                    </div>
                </div>

                <div class="contact-personal-info">

                    <div class="info-container">
                        <p>Email</p>
                        <p><?= $requestedContact["email"]?></p>
                    </div>

                    <div class="info-container">
                        <p>Telephone</p>
                        <p><?= $requestedContact["telephone"]?></p>
                    </div>

                    <div class="info-container">
                        <p>Company</p>
                        <p><?= $requestedContact["company"]?></p>
                    </div>

                    <div class="info-container">
                        <p>Assigned To</p>
                        <p><?= users_name_by_id($requestedContact["assigned_to"])?></p>
                    </div>

                </div>

                <div class="notes-container">

                    <div class="notes-header">
                        <img src="assets/images/notes.svg"  width="32px" alt="">
                        <p>Notes</p>
                    </div>

                    <div class="notes">
                        

                        

                    </div>

                    <div class="add-note">
                        <p>Add a note about <?= $requestedContact["firstname"]?></p>
                        <form action="" method="post" id="note-form">
                            <textarea name="note" id="note" cols="30" rows="10"></textarea>
                            <div class="add-note-btn">
                            <button type="submit" id= "note-submit">Add Note</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                
            </div>
        <?php } else { ?> 
            <div class="contact-warning-container">
                <p class="contact-warning"><?=$errors[0]?></p>
            </div>
        <?php } ?>

        <?php require "includes/footer.php"; ?>

    </div>
<?php } else { ?> 
    <?php require "includes/warning.php"; ?>
<?php } ?> 

</body>
</html>