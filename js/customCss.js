function simpleOnFocus(e) {
    e.value = "";
}

function changeFontColor(e) {
    document.getElementById("font_color").style.color = e.value;
}

function changeBackgroundColor(e) {
    document.getElementById("custom_color").style.backgroundColor = e.value;
}

function changeFontFamily(e) {
    document.getElementById("custom_font").style.fontFamily = e.value;
}

function simpleOnReset() {
    document.getElementById("custom_font").style.fontFamily = "#000000";
    document.getElementById("custom_color").style.backgroundColor = "#000000";
    document.getElementById("font_color").style.color = "Arial";
    alert("Reset");
}

function simpleOnSubmit() {
    window.alert("Submit");
}

function eventDetails(event) {
    if(event.altKey) {
        alert("Submit with alt, client x: " + event.clientX + " client y: " + event.clientY + " screen x:" + event.screenX + " screen y: " + event.screenY);
    }
    if(event.ctrlKey) {
        alert("Submit with ctrl, client x: " + event.clientX + " client y: " + event.clientY + " screen x:" + event.screenX + " screen y: " + event.screenY);
    }
    if(event.shiftKey) {
        alert("Submit with shift, client x: " + event.clientX + " client y: " + event.clientY + " screen x:" + event.screenX + " screen y: " + event.screenY);
    }
}

function uniKeyCode(event) {
    var key = event.keyCode;
    document.getElementById("demo2").innerHTML = "The Unicode KEY code is: " + key;
}


