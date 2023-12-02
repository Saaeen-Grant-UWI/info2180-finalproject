<?php 

require "core/init.php"; 
$title = "Users"

?>

<?php require "includes/header.php"; ?>
<link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>

    <?php require "includes/banner.php"; ?>
    <?php require "includes/sidebar.php"; ?>

    <div class="container">

        <div class="contact-info-container">

            <div class="page-title">
                <div class="contact-title">
                    <div class="profile"></div>
                    <div class="title-info">
                        <h1>Mr.Michael Scott</h1>
                        <p>Created on November 9, 2022 by David Wallace</p>
                        <p>Updated on November 13, 2022</p>
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
                    <p>michael.scott@paper.co</p>
                </div>

                <div class="info-container">
                    <p>Telephone</p>
                    <p>876-999-9999</p>
                </div>

                <div class="info-container">
                    <p>Company</p>
                    <p>The Paper Company</p>
                </div>

                <div class="info-container">
                    <p>Assigned To</p>
                    <p>Jen Levinson</p>
                </div>

            </div>

            <div class="notes-container">

                <div class="notes-header">
                    <img src="assets/images/notes.svg"  width="32px" alt="">
                    <p>Notes</p>
                </div>

                <div class="notes">
                    <div class="note">
                        <p class="title">Jane Doe</p>
                        <p class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum cum debitis iusto earum deserunt eligendi sint, eaque, omnis voluptatum esse nam, corrupti aspernatur saepe cupiditate aliquid assumenda. A et repudiandae ad quasi!</p>
                        <p class="date">November 10, 2022 at 4pm</p>
                    </div>

                    <div class="note">
                        <p class="title">Jane Doe</p>
                        <p class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum cum debitis iusto earum deserunt eligendi sint, eaque, omnis voluptatum esse nam, corrupti aspernatur saepe cupiditate aliquid assumenda. A et repudiandae ad quasi!</p>
                        <p class="date">November 11, 2022 at 10am</p>
                    </div>

                    <div class="note">
                        <p class="title">Jane Doe</p>
                        <p class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum cum debitis iusto earum deserunt eligendi sint, eaque, omnis voluptatum esse nam, corrupti aspernatur saepe cupiditate aliquid assumenda. A et repudiandae ad quasi!</p>
                        <p class="date">November 12, 2022 at 6pm</p>
                    </div>
                </div>

                <div class="add-note">
                    <p>Add a note about Micheal</p>
                    <form action="" method="post">
                        <textarea name="note" id="note" cols="30" rows="10"></textarea>
                        <div class="add-note-btn">
                        <button type="submit">Add Note</button>
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>

        <?php require "includes/footer.php"; ?>

    </div>


</body>
</html>