

window.onload =  typeWriter();

var type = 0;
var speed = 10;
function typeWriter() {

    let name = "Robert Wood Jr";
    if( type < name.length){
        document.getElementById("welcome").innerHTML += name.charAt(type);
        type++;
        typeWriter(type, speed);
    }
    //document.getElementById("welcome").innerHTML += name.charAt(type);
    //document.getElementById("welcomeText").innerHTML += position.charAt(type);
    //type++;
    //setTimeout(typeWriter, speed);
    //position();
}
/*

function position(){
    let position = "Software Developer";
    document.getElementById("welcomeText").innerHTML += position.charAt(type);
    type++;
    setTimeout(typeWriter, speed);
}*/

/*

var type = 0;
var speed = 10; //change back to 75 when done 10 is for testing sake
function typeWriter() {
    userName = document.getElementById("mainUserName").value.toUpperCase();
    var txt = "Do you want to play YATZY " + userName + " ?";
    document.getElementById("yourName").setAttribute("hidden", true);
    document.getElementById("doYou").removeAttribute("hidden");
    if (type < txt.length) {
        document.getElementById("doYou").innerHTML += txt.charAt(type);
        type++;
        setTimeout(typeWriter, speed);
    }
    else{
        document.getElementById("yesNoButton").removeAttribute("hidden");
    }
}*/
