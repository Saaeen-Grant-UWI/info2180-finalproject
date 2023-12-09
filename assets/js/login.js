$(document).ready(function(){
    $("#user-login").click(function(e){
        e.preventDefault()
        const form_data = $("#user-login-form").serializeArray()

        $.ajax({
            type: "POST",
            url: "modules/login.module.php",
            data: form_data,
            success: function(data) {
                let error_data = JSON.parse(data)
                $(".input-error").addClass("hide")
                for(error in error_data) {
                    $(`.${error}-error`).html(error_data[error])
                    $(`.${error}-error`).removeClass("hide")
                }
                
                if(jQuery.isEmptyObject(error_data)) {
                    window.location.href = "dashboard.php"
                }
            },
            error: function(data) {
                console.log(data)
            }
        })
        
    })
})