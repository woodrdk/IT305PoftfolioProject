

window.onload =  typeWriter();

var type = 0;
var speed = 10;
function typeWriter() {

    let name = "Robert Wood Jr";

    document.getElementById("welcome").innerHTML += name.charAt(type);
    document.getElementById("welcomeText").innerHTML += position.charAt(type);
    type++;
    setTimeout(typeWriter, speed);
    //position();
}
function position(){
    let position = "Software Developer";
    document.getElementById("welcomeText").innerHTML += position.charAt(type);
    type++;
    setTimeout(typeWriter, speed);
}