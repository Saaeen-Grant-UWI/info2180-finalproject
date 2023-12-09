<?php

require "../core/init.php"; 

$errors = [];
$requestedContact = [];
$title = "Contact";


if(!empty($_SESSION["current_contact"])) {
    
    $requestedContact = $_SESSION["current_contact"];
    
}

?>

<script>
$("#note-submit").click(function(e) {
e.preventDefault()
    const formdata = $("#note-form").serializeArray()

    $.ajax({
        type: "POST",
        url: "modules/addnotes.module.php",
        data: formdata,
        success: function (data) {
            if(formdata[0].value=="") {
                $(".note-warning").removeClass("hide")
                setTimeout(function() {
                    $(".note-warning").addClass("hide")    
                }, 2500);
            } else {
                $(".notes").html(data)
                $("#note-form").trigger("reset")
            }
            
        },
        error: function (data) {
            console.log(data)
        }

    })
    
})

$("#assignTM").click(function(e) {
    e.preventDefault()
    $.ajax({
        type: "GET",
        url: "modules/assign_switch.module.php?action=0",
        success: function (data) {
            $("#assigned-user").html(data)
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }

    })
})

// $("#switch").click(function(e) {
//     e.preventDefault()


//     $.ajax({
//         type: "GET",
//         url: "modules/assign_switch.module.php?action="+$("#switch").attr('class'),
//         success: function (data) {
//             // $("#assigned-user").html(data)
//             $("#switch").replaceWith(data)
//         },
//         error: function (data) {
//             console.log(data)
//         }

//     })
// })

$(document).on('click', '#switch', function(e){
    e.preventDefault()


    $.ajax({
        type: "GET",
        url: "modules/assign_switch.module.php?action="+$("#switch").attr('class'),
        success: function (data) {
            // $("#assigned-user").html(data)
            $("#switch").replaceWith(data)
        },
        error: function (data) {
            console.log(data)
        }

    })
})

</script>


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
            <a href="#" id="assignTM"><span><img src="assets/images/assign.svg"  width="32px" alt=""></span>Assign to me</a>
            <a href="#" id="switch" class="<?=$requestedContact["type"]=="sales lead"? "1":"2" ?>" ><span><img src="assets/images/switch.svg"  width="32px" alt=""></span>Switch to <?=$requestedContact["type"]!="sales lead"? ucwords("sales lead"):ucwords("support") ?></a>
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
            <p id="assigned-user"><?= users_name_by_id($requestedContact["assigned_to"])?></p>
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
                    <p class="note-warning hide">Note Text Area Is Empty!</p>
                    <button type="submit" id= "note-submit">Add Note</button>
                </div>
            </form>
        </div>
        
    </div>
    
</div>

<?php require "../includes/footer.php"; ?>
