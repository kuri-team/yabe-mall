const FORM = document.getElementById("contact-form")
const FIRST_NAME = document.getElementById("fname");
const LAST_NAME = document.getElementById("lname");
const EMAIL = document.getElementById("email_add");
const PHONE = document.getElementById("phone_num");

const FNAME_REQUIREMENT = document.getElementById("fname-greater-3");
const LNAME_REQUIREMENT = document.getElementById("lname-greater-3");
const EMAIL_REQUIREMENT = document.getElementById("email-pattern");
const PHONE_REQUIREMENT = document.getElementById("phone-pattern")




// First name validation
// When the user clicks on the first name field, show the message box
FIRST_NAME.onfocus = function() {
    document.getElementById("message-fname").style.display = "block";
}
// When the user clicks outside of the first name field, hide the message box
FIRST_NAME.onblur = function() {
    document.getElementById("message-fname").style.display = "none";
}
// When the user starts to type something inside the first name field
FIRST_NAME.onkeyup = function() {

    // Validate FNAME_REQUIREMENT
    if(FIRST_NAME.value.length >= 3) {
        FNAME_REQUIREMENT.classList.remove("invalid");
        FNAME_REQUIREMENT.classList.add("valid");
    } else {
        FNAME_REQUIREMENT.classList.remove("valid");
        FNAME_REQUIREMENT.classList.add("invalid");
    }
}

// Last name validation
// When the user clicks on the password field, show the message box
LAST_NAME.onfocus = function() {
    document.getElementById("message-lname").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
LAST_NAME.onblur = function() {
    document.getElementById("message-lname").style.display = "none";
}
// When the user starts to type something inside the password field
LAST_NAME.onkeyup = function() {

    // Validate FNAME_REQUIREMENT
    if(LAST_NAME.value.length >= 3) {
        LNAME_REQUIREMENT.classList.remove("invalid");
        LNAME_REQUIREMENT.classList.add("valid");
    } else {
        LNAME_REQUIREMENT.classList.remove("valid");
        LNAME_REQUIREMENT.classList.add("invalid");
    }
}


// Email validation
EMAIL.onfocus = function() {
    document.getElementById("message-email").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
EMAIL.onblur = function() {
    document.getElementById("message-email").style.display = "none";
}
// When the user starts to type something inside the password field
EMAIL.onkeyup = function() {

    // Validate FNAME_REQUIREMENT
    let emailRegEx = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(EMAIL.value.match(emailRegEx)) {
        EMAIL_REQUIREMENT.classList.remove("invalid");
        EMAIL_REQUIREMENT.classList.add("valid");
    } else {
        EMAIL_REQUIREMENT.classList.remove("valid");
        EMAIL_REQUIREMENT.classList.add("invalid");
    }
}


// Phone validation
PHONE.onfocus = function() {
    document.getElementById("message-phone").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
PHONE.onblur = function() {
    document.getElementById("message-phone").style.display = "none";
}
// When the user starts to type something inside the password field
PHONE.onkeyup = function() {

    // Validate FNAME_REQUIREMENT
    let phoneRegEx = /^([0-9][-. ]?){9,11}[^-. ]$/;
    if(PHONE.value.match(phoneRegEx)) {
        PHONE_REQUIREMENT.classList.remove("invalid");
        PHONE_REQUIREMENT.classList.add("valid");
    } else {
        PHONE_REQUIREMENT.classList.remove("valid");
        PHONE_REQUIREMENT.classList.add("invalid");
    }
}


FORM.addEventListener("submit", function() {
    console.log("function called");

    // Get form values
    const CHECKBOXES = document.querySelector("#checkbox-form").querySelectorAll("input[type=checkbox]");
    const MESSAGE = FORM.message.value;

    // Variables
    let err = "";  // err variable is used to show error message.
    let errNum = 0;  // errNum variable is used to show error index


    // Logic
    let atLeastOneCheckboxChecked = false;
    for (let i = 0; i < CHECKBOXES.length; i++) {
        if (CHECKBOXES[i].checked) {
            atLeastOneCheckboxChecked = true;
            break;
        }
    }

    if (!atLeastOneCheckboxChecked) {
        errNum++;
        err += errNum + ". At least one checkbox must be checked.\n";
    }

    if (MESSAGE === "" || MESSAGE.length < 50 || MESSAGE.length > 500) {
        // If the user didn't enter anything in Message field than show error
        errNum++;
        err += errNum + ". Valid message contains 50 to 500 letters.\n";
    }

    if (!FORM.contact_method[0].checked && !FORM.contact_method[1].checked) {
        // If the user didn't check 0 index of gender field  or 1 index than show error(Contact Method)
        errNum++;
        err += errNum + ". Select Preferred Contact Method.\n";
    }

    if (FORM.contact_purpose.selectedIndex < 1) {
        // Check the user's selection index if your index is less than 1 than show error (Contact Purpose)
        errNum++;
        err += errNum + ". PLease select your contact Purpose.\n";
    }

    // if(strUser === 0)
    // {
    //     errNum++;
    //     err += errNum + ". PLease select your contact Purpose.\n";
    // }

    console.log(errNum);

    if (errNum>0) {
        // If errNum is greater than 0 than alert error and return "false"
        alert(err);
        return false;
    } else {
        // If errNum is less than 0 or 0 than alert "done" and return "true"
        alert("Sent!");
        return true;
    }

});

// select an non default option for dropdown menu
// function myFunction()
// {
//     let e = document.getElementById("purpose");
//     let strUser = e.options[e.selectedIndex].value;
//
//     if(strUser === 0)
//     {
//         alert("Please select a user");
//     }
// }


// Word-count Messages
// keydown for keeping the backspace
document.getElementById("message").addEventListener("keydown", updateRequirementMessage);

function updateRequirementMessage() {
    let message = document.getElementById("message").value;
    let T = message.length;
    let advice;

    if (T < 50) {
        advice = "Your message needs " + (50-T) + " more letters.";
        document.getElementById('remaining-letters').innerHTML = advice.fontcolor("red");
    }
    else if (T <= 500) {
        advice = "You have " + (500 - T) + " letters left.";
        document.getElementById('remaining-letters').innerHTML = advice.fontcolor("green");
    }
    else {
        advice = "Your message is exceeding " + (T - 500) + " letters.";
        document.getElementById('remaining-letters').innerHTML = advice.fontcolor("red");
    }
}

