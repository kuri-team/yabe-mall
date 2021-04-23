const form = document.getElementById("contact-form");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const phone_num = document.getElementById("phone_num");

//Check email
function checkEmail(input) {
    let x = document.contact - form.email_add.value;
    // email contains the @ and . character
    let atposition = x.indexOf("@");
    let dotposition = x.lastIndexOf(".");
    const char = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (char.test(input.value.trim())) {
        ShowSuccess(input);
    } else {
        ShowError(input, "Invalid Email");
    }
    // At least one character before and after the @.
    // At least two characters after . (dot).
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
        alert("Please enter a valid e-mail \n atpostion:" + atposition + "\n dotposition:" + dotposition);
        return false;
    }
}

//check phone number
function checkPhoneNum (inputtxt)
{
    let phone = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    if(inputtxt.contact-form.match(phone)) {
        return true;
    }
    else if (password.length < 11) {
        alert("Phone number must be at least 11 characters long.");
        return false;
    }
}

function checkRequired(inputErr) {
    inputErr.forEach(function(input){
        if (input.value.trim() === "") {
            ShowError(input, `${getFieldName(input)} is required`);
        }else {
            ShowSuccess(input);
        }
    });
}
function checkLenght(input, min, max) {
    if (input.value.length < min) {
        ShowError(input, `${getFieldName(input)} must be at least ${min} characters`);
    }else if(input.value.length > max){
        ShowError(input, `${getFieldName(input)} must be less then ${max} characters`);
    }else {
        ShowSuccess(input);
    }
}
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1)
}

form.addEventListener('submit', function(e){
    e.preventDefault();
    checkRequired([fname, email, phone_num,]);
    checkLenght(fname, 3, 25);
    checkLenght(lname, 3, 25);
    checkLenght(phone_num, 9, 11);
    checkEmail(email);
    getFieldName(fname, lname)
    checkPhoneNum(phone_num)
});


// checked boxes must be selected at least 1 option
(function() {
    const form = document.querySelector('#checkbox-form');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

    function init() {
        if (firstCheckbox) {
            for (let i = 0; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }

            checkValidity();
        }
    }

    function isChecked() {
        for (let i = 0; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }

        return false;
    }

    function checkValidity() {
        const errorMessage = !isChecked() ? 'Should select at least a box' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }

    init();
})();
// error message for name
let nameError = document.getElementById('fname, lname');
nameError.oninvalid = function(event) {
    event.target.setCustomValidity('PLease enter at least 3 characters!');
}

let messageError = document.getElementById('message');
messageError.oninvalid = function(event) {
    event.target.setCustomValidity('PLease enter 50 to 500 letters!');
}

const messageCharacter = document.getElementById("message");
const remainingLetter = document.getElementById("remaining-letters");
const maxCharacter = 250;

message.addEventListener("input", () => {
    const remaining = maxCharacter - messageCharacter.value.length;
    remainingLetter.textContent = `${remaining} letters remaining`;
})