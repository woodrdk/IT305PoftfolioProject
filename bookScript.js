

// When form is submitted by the submit button it runs validate()
//document.getElementById("guest-form").onsubmit = validate;

// Validates all required and if not valid shows errors
function validate(){
    // Are all required pieces valid allowing it to be sent.
    var send = true;

    // Clears all error messages
    var errors = document.getElementsByClassName("err");
    for(var i = 0; i < errors.length; i++){
        errors[i].style.visibility = "hidden";
    }

    // Checks for first name
    var fName = document.getElementById("firstName").value;
    if(fName === ""){
        var errFirst = document.getElementById("err-fName");
        errFirst.style.visibility = "visible";
        send = false;
    }

    // Checks for last name
    var lName = document.getElementById("lastName").value;
    if(lName === ""){
        var errLast = document.getElementById("err-lName");
        errLast.style.visibility = "visible";
        send = false;
    }

    // email check
    if(!validateEmail()){
        send = false;
    }

    // Checks for a LinkedIn Value
    var url = document.getElementById("linked").value;
    // If url is not null runs is_url();
    if(url !== ""){
        send = is_url(url);
    }
    // Checks for how we met response
    var how = $('#how').find(":selected").val();
    if(how === "none"){
        var errHow = document.getElementById("err-how");
        errHow.style.visibility = "visible";
        send = false;
    }
    return send;
}

function  validateEmail(){
    var errEmail = document.getElementById("err-email");
    var emailAddy = document.getElementById("email").value;
    var email = document.getElementById("email").value;
    if(document.getElementById("mail").checked === true){
        // Checks that email address !null
        if(emailAddy === ""){
            // If null makes error visible
            errEmail.style.visibility = "visible";
            return false;
        }
        else{
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
                errEmail.style.visibility = "visible";
                return false;
            }
        }
    }
    else{
        if(emailAddy !== ""){
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
                errEmail.style.visibility = "visible";
                return false;
            }
        }
    }
}

// This function hides & reveals the radio buttons for if they want mail list email in text or html
$("#mail").on("change", function(){
    var x = document.getElementById("radButtons");
    if(document.getElementById("mail").checked === true){
        $('#radButtons').show();

    }
    else{
        $('#radButtons').hide();
    }
});

// Makes other text box show up if how we met selected is other
/*function howMet(){
    var howWeMet = $('#how').find(":selected").val();
    if(howWeMet === "other" ){
        let other = document.getElementById("other");
        other.style.visibility = "visible";
        $('#other').show();
    }
    else{
        $('#other').hide();
    }
}*/

// Checks if url is proper format
function is_url(url)
{
    if (!url.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g)){
        var errLinked = document.getElementById("err-linked");
        errLinked.style.visibility = "visible";
        return false;
    }
}