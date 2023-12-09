<?php 
require "core/init.php"; 
$errors = [];
$title = "Contact";

if (!empty($_GET)) {
    if (!(count($_GET) > 1)) {
        if (!empty($_GET["contact"])) {
            $contactId = $_GET["contact"];
            $result = get_where("contacts", ["id", $contactId]);

            if (!empty($result)) {
                $requestedContact = $result[0];
                $_SESSION["current_contact"] = $requestedContact;
            } else {
                $errors[0] = "Requested <span>contact</span> not found";
            }
        } else {
            $errors[0] = "Invalid <span>contact</span> request";
        }
    } else {
        $errors[0] = "Invalid amount of <span>contact</span> requests";
    }
} else {
    $errors[0] = "No <span>contact</span> request found";
}

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
        
    <?php if(!empty($errors)) { ?>
        <div class="contact-warning-container">
                    <p class="contact-warning"><?=$errors[0]?></p>
        </div>
    <?php } ?> 
    </div>

<?php } else { ?> 
    <?php require "includes/warning.php"; ?>
<?php } ?> 

</body>
</html>