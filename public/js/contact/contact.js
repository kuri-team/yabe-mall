const FORM = document.getElementById("contact-form");

FORM.addEventListener("submit", function () {
    //Get the value of name(selecter) and put in firstName(variable)
    let firstName = FORM.fname.value;
    let lastName = FORM.lname.value;

    //Get the value of phone(selecter) and put in phone_num(Variable)
    let gPhone = FORM.phone_num.value;

    //Get the value of email(selecter) and put in gEmail(Variable)
    let gEmail = FORM.email_add.value;

    //Get the Value of message(selecter) and put in gMessage (Variable)
    let gMessage = FORM.message.value;

    //Create RegExp pattern to validate our email address value coming from a form field.
    let emailPattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    //Create RegExp pattern to validate our phone number value coming from a form field.
    let phonePattern =/^([0-9][-. ]?){1,}[^-. ]$/;

    //Find a single character, except newline or line terminator
    let namePattern = /\./;

    //Only digits find
    let namePatDgt = /\d/;

    // err variable is used to show error message.
    let err = "";

    // errNum variable is used to show error index
    let errNum = 0;

    //  Checks the value : If Value empty  or value length less than 3 or value is digit than Show error Indvalid Name
    if (firstName == "" || firstName.length < 3 || namePattern.test(firstName) || namePatDgt.test(firstName)) {
        errNum++;
        err += errNum + ". Invalid name. Valid first name contains at least 3 letters.\n";
    }
    if (lastName == "" || firstName.length < 3 || namePattern.test(firstName) || namePatDgt.test(firstName)) {
        errNum++;
        err += errNum + ". Invalid name. Valid last name contains at least 3 letters.\n";
    }

    /* Check the phone number : If phone number is empty or value length less than 12 or is not a null then show error Invalid Phone number */
    if (gPhone == "" || 9 <= gPhone.length <= 11 || phonePattern.test(gPhone)) {
        errNum++;
        err += errNum + ". Invalid phone number. Valid phone number contains 9 to 11 digits\n";
    }

    /* If you don't Enter anything in Email field than show error(Enter Email)  */
    if (gEmail == "") {
        errNum++;
        err += errNum + ". Enter Email.\n";
    }
    /*  If you don't Enter Email address in email pattern format (i already described "emailPattern") then see error (Invalid Email)  */
    else{
        if(!emailPattern.test(gEmail)){
            errNum++;
            err += errNum + ". Invalid Email. Valid email has the form [name]@[domain]\n";
        }
    }

    /* If you don't Enter anything in Message field than show error */
    if (gMessage == "" || 50 <= gPhone.length <= 500) {
        errNum++;
        err += errNum + ". Enter message contains 50 to 500 letters.\n";
    }

    /* If you don't  checked 0 index of gender field  or 1 index than show error(Contact Method)*/
    if (!FORM.contact_method[0].checked && !FORM.contact_method[1].checked) {
        errNum++;
        err += errNum + ". Select Preferred Contact Method.\n";
    }

    /*  If you don't checked any contact day then show error(contact-day-checkbox) */
    if (!FORM.mon.checked && !FORM.tues.checked &&
        !FORM.wed.checked && !FORM.thur.checked &&
        !FORM.fri.checked && !FORM.sat.checked &&
        !aelementrg.sun.checked) {
        errNum++;
        err += errNum + ". Select at least 1 Contact Day.\n";
    }

    /*  Check your selection index if your index is less than 1 than show error (Contact Purpose) */
    if (FORM.contact_purpose.selectedIndex < 1) {
        errNum++;
        err += errNum + ". PLease select your contact Purpose.\n";
    }

    /*  If errNum is greater than 0 than alert error and return "false" */
    if (errNum>0) {
        alert(err);
        return false;
    }
    /* If errNum is less than 0 or 0 than alert "done" and return "true"*/
    else{
        alert('done');
        return true;
    }
});


// At least one checkbox must be checked
const CHECKBOXES = document.querySelector('#checkbox-form').querySelectorAll('input[type=checkbox]');
const CHECK_BOX_LENGTH = CHECKBOXES.length;
const FIRST_CHECK_BOX = CHECK_BOX_LENGTH > 0 ? CHECKBOXES[0] : null;

function isChecked() {
    for (let i = 0; i < CHECK_BOX_LENGTH; i++) {
        if (CHECKBOXES[i].checked) return true;
    }
    return false;
}

function checkValidity() {
    const ERROR_MESSAGE = !isChecked() ? 'Should select at least a box' : '';
    FIRST_CHECK_BOX.setCustomValidity(ERROR_MESSAGE);
}

if (FIRST_CHECK_BOX) {
    for (let i = 0; i < CHECK_BOX_LENGTH; i++) {
        CHECKBOXES[i].addEventListener('change', checkValidity);
    }

    checkValidity();
}



// Word-count Messages
document.getElementById("message").addEventListener("keyup", updateRequirementMessage);

function updateRequirementMessage() {
    let message = document.getElementById("message").value;
    let T = message.length;
    let advice = "";

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