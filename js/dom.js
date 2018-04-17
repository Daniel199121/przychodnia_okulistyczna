function addSolutionDetails() {
    var textArea = document.createElement("textarea");
    var details = document.getElementById("solution_details");
    if(details.childNodes.length > 0) {
        details.removeChild(details.firstChild);
    }
    else {
        details.appendChild(textArea);
    }
}

function countElements() {
    var images = document.getElementById("images_count");
    var links = document.getElementById("links_count");
    var forms = document.getElementById("forms_count");
    var anchors = document.getElementById("anchors_count");
    var first_image = document.getElementById("first_image");
    var first_link = document.getElementById("first_link");

    images.innerHTML = document.images.length;
    links.innerHTML = document.links.length;
    forms.innerHTML = document.forms.length;
    anchors.innerHTML = document.anchors.length;

    var img = document.createElement("img");
    img.setAttribute("src", document.images.item(0).getAttribute("src"));
    first_image.replaceChild(img, first_image.firstChild);

    first_link.innerHTML = document.links.namedItem("solution_link");
}

function myFunction2() {
    var newItem = document.createElement("LI");
    var textnode = document.createTextNode("LEKARZA");
    newItem.appendChild(textnode);

    var list = document.getElementById("myList");
    list.insertBefore(newItem, list.childNodes[0]);
}

var x = 0;
var y = 0;
var z = 0;
var v = 0;

function myMoveFunction() {
    document.getElementById("demo").innerHTML = z+=1;
}

function myDownFunction() {
    document.getElementById("demo2").innerHTML = x+=1;
}

function myOverFunction() {
    document.getElementById("demo3").innerHTML = y+=1;
}

function myOutFunction() {
    document.getElementById("demo4").innerHTML = v+=1;
}
