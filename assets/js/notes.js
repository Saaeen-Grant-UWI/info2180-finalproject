$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "modules/addnotes.module.php",
        success: function(data) {
            console.log(data)
            $(".notes").html(data)
        },
        err: function(data) {
            console.log(data)
        }

    })

    $("#note-submit").click(function(e) {
        e.preventDefault()
        const formdata = $("#note-form").serializeArray()
        console.log(formdata)

        $.ajax({
            type: "POST",
            url: "modules/addnotes.module.php",
            data: formdata,
            success: function (data) {
                console.log(data)
                $(".notes").html(data)
                $("#note-form").trigger("reset")
            },
            err: function (data) {
                console.log(data)
            }

        })

        $.ajax({
            type: "GET",
            url: "modules/addnotes.module.php",
            success: function (data) {
                console.log(data)
                $(".notes").html(data)
            },
            err: function (data) {
                console.log(data)
            }

        })
    })

    
})