

function changeContentImage(e) {
    var data = e.getAttribute('data-content');
    var url = "";
    var desc = "";
    if(data === "snapchat") {
        url = "/img/snapchat.png";
        desc = "Testowe description"
    }
    else if(data === "twitter") {
        url = "/img/twitter.png";
        desc = "Jedyny taki z" + Math.floor(Math.random() * 1000000);
    } else {
        url = "/img/viber.png";
        desc = Math.round(Math.random() * 1000000) + " unikalnych użytkowników";
    }

    document.getElementById("content-images").style.backgroundImage = "url('" + url + "')";
    document.getElementById("description").innerHTML = desc;
}

function printResetInfo() {
    document.writeln("Formularz został zrestartowany");
}

function randomNumber() {
    var number = prompt("Podaj numer");
    alert("Twoj numer to:" + parseInt(number));
}

function randomNumberFloat() {
    var number = prompt("Podaj liczbe typu float");
    alert("Liczba ta to: " + parseFloat(number));
}


var d = document.getElementById("buttonevent");
d.addEventListener("click", myFunction);

function myFunction() {
    alert ("Wykonane przez Daniel Kuźnicki!")
}

    function clicked() {
        console.log("click");
    }
window.addEventListener('click', clicked);
document.getElementById("reset").addEventListener("click", printResetInfo);

