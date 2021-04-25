// Form validation
const FORM = document.getElementById("contact-form");

FORM.addEventListener("submit", function () {
    // Get form values
    const FIRST_NAME = FORM.fname.value;
    const LAST_NAME = FORM.lname.value;
    const PHONE = FORM.phone_num.value;
    const EMAIL = FORM.email_add.value;
    const CHECKBOXES = document.querySelector("#checkbox-form").querySelectorAll("input[type=checkbox]");
    const MESSAGE = FORM.message.value;

    // Create RegExp patterns
    const REGEX_EMAIL = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const REGEX_PHONE = /^([0-9][-. ]?){9,11}[^-. ]$/;
    const REGEX_NAME = /\./;  // Find a single character, except newline or line terminator
    const REGEX_NAME_DIGIT = /\d/;  // Only digits find

    // Variables
    let err = "";  // err variable is used to show error message.
    let errNum = 0;  // errNum variable is used to show error index


    // Logic
    if (FIRST_NAME === "" || FIRST_NAME.length < 3 || REGEX_NAME.test(FIRST_NAME) || REGEX_NAME_DIGIT.test(FIRST_NAME)) {
        // Checks the value: If Value empty  or value length less than 3 or value is digit than Show error Invalid Name
        errNum++;
        err += errNum + ". Invalid name. Valid first name contains at least 3 letters.\n";
    }

    if (LAST_NAME === "" || FIRST_NAME.length < 3 || REGEX_NAME.test(FIRST_NAME) || REGEX_NAME_DIGIT.test(FIRST_NAME)) {
        errNum++;
        err += errNum + ". Invalid name. Valid last name contains at least 3 letters.\n";
    }

    if (PHONE === "" || !REGEX_PHONE.test(PHONE)) {
        // Check the phone number : If phone number is empty or value length less than 12 or is not a null then show error Invalid Phone number
        errNum++;
        err += errNum + ". Invalid phone number. Valid phone number contains 9 to 11 digits\n";
    }

    if (EMAIL === "") {
        // If you don't Enter anything in Email field than show error(Enter Email)
        errNum++;
        err += errNum + ". Enter Email.\n";
    } else {
        // If you don't Enter Email address in email pattern format (i already described "REGEX_EMAIL") then see error (Invalid Email)
        if(!REGEX_EMAIL.test(EMAIL)){
            errNum++;
            err += errNum + ". Invalid Email. Valid email has the form [name]@[domain]\n";
        }
    }

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
        err += errNum + ". Enter message contains 50 to 500 letters.\n";
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


// Word-count Messages
document.getElementById("message").addEventListener("keyup", updateRequirementMessage);

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