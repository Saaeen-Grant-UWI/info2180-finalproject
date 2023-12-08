document.addEventListener("DOMContentLoaded", () => {
    let filterAll = document.querySelector("#filterAll");
    let filterSL = document.querySelector("#filterSL");
    let filterS = document.querySelector("#filterSupport");
    let filterATM = document.querySelector("#filterATM");
    let url = "http://localhost/info2180-finalproject/dashboard.php";

    function letsFetch(query) {
        fetch(url + "?filter=" + query)
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.log(error);
        })
    }
    

    
    filterAll.addEventListener("click", () => {
        letsFetch("all")
    })

    filterSL.addEventListener("click", () => {
        letsFetch("sl")
    })

    filterS.addEventListener("click", () => {
        letsFetch("support")
    })

    filterATM.addEventListener("click", () => {
        letsFetch("atm")
    })
})