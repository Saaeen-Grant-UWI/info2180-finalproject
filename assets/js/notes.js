$(document).ready(function() {


    $.ajax({
        type: "GET",
        url: "modules/contact.module.php",
        success: function(data) {
            $(".container").html(data)
        },
        error: function(data) {
            console.log(data)
        }

    })

        $.ajax({
        type: "GET",
        url: "modules/addnotes.module.php",
        success: function(data) {
            $(".notes").html(data)
        },
        error: function(data) {
            console.log(data)
        }

    })

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

    
})