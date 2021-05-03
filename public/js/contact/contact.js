// Instant feedback validation constant
const FNAME_REQUIREMENT = document.getElementById("fname-greater-3");
const LNAME_REQUIREMENT = document.getElementById("lname-greater-3");
const EMAIL_REQUIREMENT = document.getElementById("email-pattern");
const PHONE_REQUIREMENT = document.getElementById("phone-pattern")
const FIRST_NAME = document.getElementById("fname");
const LAST_NAME = document.getElementById("lname");
const EMAIL = document.getElementById("email_add");
const PHONE = document.getElementById("phone_num");

// Form validation
const FORM = document.getElementById("contact-form");

FORM.addEventListener("submit", function() {
    console.log("function called");

    // Get form values
    const FORM = document.getElementById("contact-form")
    const FIRST_NAME_CONSOLE_ALERT = FORM.fname.value;
    const LAST_NAME_CONSOLE_ALERT = FORM.lname.value;
    const PHONE_CONSOLE_ALERT = FORM.phone_num.value;
    const EMAIL_CONSOLE_ALERT = FORM.email_add.value;
    const CHECKBOXES_CONSOLE_ALERT = document.querySelector("#checkbox-form").querySelectorAll("input[type=checkbox]");
    const MESSAGE_CONSOLE_ALERT = FORM.message.value;


    // Create RegExp patterns
    const REGEX_EMAIL_CONSOLE_ALERT = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const REGEX_PHONE_CONSOLE_ALERT = /^([0-9][-. ]?){9,11}[^-. ]$/;

    // Variables
    let err = "";  // err variable is used to show error message.
    let errNum = 0;  // errNum variable is used to show error index

    // Logic
    if (FIRST_NAME_CONSOLE_ALERT === "" || FIRST_NAME_CONSOLE_ALERT.length < 3) {
        // Checks the value: If Value empty  or value length less than 3 or value is digit than Show error Invalid Name
        errNum++;
        err += errNum + ". Invalid first name. Valid first name contains at least 3 letters.\n";
    }

    if (LAST_NAME_CONSOLE_ALERT === "" || LAST_NAME_CONSOLE_ALERT.length < 3) {
        errNum++;
        err += errNum + ". Invalid last name. Valid last name contains at least 3 letters.\n";
    }

    if (PHONE_CONSOLE_ALERT === "" || !REGEX_PHONE_CONSOLE_ALERT.test(PHONE_CONSOLE_ALERT)) {
        // Check the phone number : If phone number is empty or value length less than 12 or is not a null then show error Invalid Phone number
        errNum++;
        err += errNum + ". Invalid phone number. Valid phone number contains 9 to 11 digits\n";
    }

    if (EMAIL_CONSOLE_ALERT === "") {
        // If you don't Enter anything in Email field than show error(Enter Email)
        errNum++;
        err += errNum + ". Enter Email.\n";
    } else {
        // If you don't Enter Email address in email pattern format (i already described "REGEX_EMAIL_CONSOLE_ALERT") then see error (Invalid Email)
        if(!REGEX_EMAIL_CONSOLE_ALERT.test(EMAIL_CONSOLE_ALERT)){
            errNum++;
            err += errNum + ". Invalid Email. Valid email has the form [name]@[domain]\n";
        }
    }

    let atLeastOneCheckboxChecked = false;
    for (let i = 0; i < CHECKBOXES_CONSOLE_ALERT.length; i++) {
        if (CHECKBOXES_CONSOLE_ALERT[i].checked) {
            atLeastOneCheckboxChecked = true;
            break;
        }
    }

    if (!atLeastOneCheckboxChecked) {
        errNum++;
        err += errNum + ". At least one checkbox must be checked.\n";
    }

    if (MESSAGE_CONSOLE_ALERT === "" || MESSAGE_CONSOLE_ALERT.length < 50 || MESSAGE_CONSOLE_ALERT.length > 500) {
        // If the user didn't enter anything in Message field than show error
        errNum++;
        err += errNum + ". Valid message contains 50 to 500 letters.\n";
    }

    if (!FORM.contact_method[0].checked && !FORM.contact_method[1].checked) {
        // If the user didn't check 0 index of gender field  or 1 index than show error(Contact Method)
        errNum++;
        err += errNum + ". Select Preferred Contact Method.\n";
    }

    console.log(errNum);

    if (errNum>0) {
        // If errNum is greater than 0 than alert error and return "false"
        alert(err);
        return false;
    } else {
        // If errNum is less than 0 or 0 than alert "done" and return "true"
        alert("Your contact form is successfully submitted");
        return true;
    }
});


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


// First name validation instant feedback
// Focus mouse on the first name field, show the message box
FIRST_NAME.onfocus = function() {
    document.getElementById("message-fname").style.display = "block";
}
// Focus mouse outside of the first name field, hide the message box
FIRST_NAME.onblur = function() {
    document.getElementById("message-fname").style.display = "none";
}
// Starts typing something inside the first name field
// correct => remove error style with a checkmark
// wrong => add error style with an x indicator
FIRST_NAME.onkeyup = function() {

    // Validate FNAME_REQUIREMENT
    let firstNameRegEx = /^[A-Za-z]{3,}/;
    if(FIRST_NAME.value.match(firstNameRegEx)) {
        FNAME_REQUIREMENT.classList.remove("invalid");
        FNAME_REQUIREMENT.classList.add("valid");
    } else {
        FNAME_REQUIREMENT.classList.remove("valid");
        FNAME_REQUIREMENT.classList.add("invalid");
    }

}

// Last name validation instant feedback
// When the user clicks on the last name field, show the message box
LAST_NAME.onfocus = function() {
    document.getElementById("message-lname").style.display = "block";
}
// When the user clicks outside of the last name field, hide the message box
LAST_NAME.onblur = function() {
    document.getElementById("message-lname").style.display = "none";
}
// When the user starts to type something inside the last name field
LAST_NAME.onkeyup = function() {

    // Validate FNAME_REQUIREMENT
    let firstNameRegEx = /^[A-Za-z]{3,}/;
    if(LAST_NAME.value.match(firstNameRegEx)) {
        LNAME_REQUIREMENT.classList.remove("invalid");
        LNAME_REQUIREMENT.classList.add("valid");
    } else {
        LNAME_REQUIREMENT.classList.remove("valid");
        LNAME_REQUIREMENT.classList.add("invalid");
    }
}


// Email validation instant feedback
EMAIL.onfocus = function() {
    document.getElementById("message-email").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
EMAIL.onblur = function() {
    document.getElementById("message-email").style.display = "none";
}
// When the user starts to type something inside the email field
EMAIL.onkeyup = function() {

    // Validate EMAIL_REQUIREMENT
    let emailRegEx = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,5}))$/;
    if(EMAIL.value.match(emailRegEx)) {
        EMAIL_REQUIREMENT.classList.remove("invalid");
        EMAIL_REQUIREMENT.classList.add("valid");
    } else {
        EMAIL_REQUIREMENT.classList.remove("valid");
        EMAIL_REQUIREMENT.classList.add("invalid");
    }
}


// Phone validation instant feedback
PHONE.onfocus = function() {
    document.getElementById("message-phone").style.display = "block";
}
// When the user clicks outside of the phone field, hide the message box
PHONE.onblur = function() {
    document.getElementById("message-phone").style.display = "none";
}
// When the user starts to type something inside the phone field
PHONE.onkeyup = function() {

    // Validate PHONE_REQUIREMENT
    let phoneRegEx = /^([0-9][-. ]?){8,10}[^-. ]$/;
    if(PHONE.value.match(phoneRegEx)) {
        PHONE_REQUIREMENT.classList.remove("invalid");
        PHONE_REQUIREMENT.classList.add("valid");
    } else {
        PHONE_REQUIREMENT.classList.remove("valid");
        PHONE_REQUIREMENT.classList.add("invalid");
    }
}
