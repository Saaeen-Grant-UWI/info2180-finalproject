document.addEventListener("DOMContentLoaded", () => {
    let assignTM = document.querySelector("#assignTM")
    let switchTo = document.querySelector("#switch")
    let url = "http://localhost/info2180-finalproject/assign_switch.module.php?something=0"

    function letsFetch(url) {
        fetch(url)
        .then(Response => Response.text())
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.log("Error")
        })
    }

    assignTM.addEventListener("click", () => {
        console.log("test")
        letsFetch(url)
    })
})