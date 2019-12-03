
document.getElementById("contact-form").onsubmit = check;
function check(){
    isValid = true;
    // Clears all error messages
    var errors = document.getElementsByClassName("err");
    for(var i = 0; i < errors.length; i++){
        errors[i].style.visibility = "hidden";
    }

    // Checks for first name
    var name = document.getElementById("name").value;
    if(name === ""){
        var errName = document.getElementById("err-Name");
        errName.style.visibility = "visible";
        isValid = false;
    }
    // Checks for last name
    var subject = document.getElementById("subject").value;
    if(subject === ""){
        var errSubject = document.getElementById("err-subject");
        errSubject.style.visibility = "visible";
        isValid = false;
    }

    // Checks for last name
    var message = document.getElementById("message").value;
    if(message === ""){
        var errMessage = document.getElementById("err-message");
        errMessage.style.visibility = "visible";
        isValid = false;
    }
    // email check
    if(!validateEmail()){
        isValid = false;
    }

    return isValid;
}


function  validateEmail(){
    var errEmail = document.getElementById("err-email");
    var emailAddy = document.getElementById("email").value;
    var email = document.getElementById("email").value;

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
    return true;
}