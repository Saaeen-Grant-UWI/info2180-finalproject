$(document).ready(function() {

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

    // $.ajax({
    //     type: "GET",
    //     url: "modules/assign_switch.module.php?action=updated-at",
    //     success: function (data) {
    //         $("#updated-at").replaceWith(data)    
    //         console.log(data)

    //     },
    //     error: function (data) {
    //         console.log(data)
    //     }

    // })

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
                url: "modules/assign_switch.module.php?action=assign-to",
                success: function (data) {
                    $("#assigned-user").replaceWith(data)
                    console.log(data)
                },
                error: function (data) {
                    console.log(data)
                }
        
            })
        })
        
        $(document).on('click', '#switch', function(e){
            e.preventDefault()
        
        
            $.ajax({
                type: "GET",
                url: "modules/assign_switch.module.php?action="+$("#switch").attr('class'),
                success: function (data) {
                    $("#switch").replaceWith(data)
                },
                error: function (data) {
                    console.log(data)
                }
        
            })
        })

})