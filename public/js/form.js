const SUBMIT_BTTN = document.querySelector(".form input[type='submit']");
const FORM_ITEMS = document.querySelectorAll(".form-item");
for (let index = 0; index < FORM_ITEMS.length; index++) {
    // Get the matching input and its label
    const INPUT = FORM_ITEMS[index].querySelector("input") || FORM_ITEMS[index].querySelector("select");
    const LABEL = FORM_ITEMS[index].querySelector("label");

    // Automatic focus to input fields when the wrapper field (.form-item) is in focus
    FORM_ITEMS[index].addEventListener("click", function () {
        INPUT.focus();
    });

    if (INPUT.type !== "password") {  // Workaround: Disable highlighting for password fields. Right now it would raise a bug on firefox: https://github.com/kuri-team/yabe-online-mall/issues/67#issue-880275945
        INPUT.addEventListener("input", function () {
            highlightInvalidField(FORM_ITEMS[index], INPUT, LABEL);
        });
    }
}

SUBMIT_BTTN.addEventListener("click", function () {
    for (let index = 0; index < FORM_ITEMS.length; index++) {
        // Get the matching input and its label
        const INPUT = FORM_ITEMS[index].querySelector("input") || FORM_ITEMS[index].querySelector("select");
        const LABEL = FORM_ITEMS[index].querySelector("label");
        if (INPUT.id !== "pwd" && INPUT.id !== "verify_pwd") {  // Excludes the password fields. See line 13.
            highlightInvalidField(FORM_ITEMS[index], INPUT, LABEL);
        }
    }
});


// Invalid fields highlighting
function highlightInvalidField(formItem, inputElement, labelElement) {
    if (inputElement.required) {
        if (!inputElement.validity.valid || inputElement.value === "" || inputElement.value === undefined) {
            formItem.setAttribute("style", "background: #ffdddd");
            labelElement.setAttribute("style", "color: #ff2222");
        } else {
            formItem.setAttribute("style", "");
            labelElement.setAttribute("style", "");
        }
    }
}


/*
* In the current document, if the amount of .toggle-password-visibility elements matches that of .password-field
* elements, then add an eventListener to each .password-field element listening for the "input" event. On that event,
* display the matching .toggle-password-visibility element.
*
* Each .toggle-password-visibility element works as a button that listens for "click" event to toggle its matching
* .password-field type between type="text" and type="password". I.e. toggling the password visibility.
* */
const PWD_VIS_TOGGLES = document.querySelectorAll(".toggle-password-visibility");
const PWD_FIELDS = document.querySelectorAll(".password-field");

if (PWD_FIELDS.length === PWD_VIS_TOGGLES.length) {
    // Setting up eventListeners and handler logic for all .password-field elements
    for (let index = 0; index < PWD_FIELDS.length; index++) {
        PWD_FIELDS[index].addEventListener("input", function () {
            PWD_VIS_TOGGLES[index].setAttribute("style", "display: inline;");
        });
    }

    // Setting up eventListeners and handler logic for all .toggle-password-visibility elements
    for (let index = 0; index < PWD_VIS_TOGGLES.length; index++) {
        PWD_VIS_TOGGLES[index].addEventListener("click", function () {
            if (PWD_FIELDS[index].getAttribute("type") === "password") {
                PWD_FIELDS[index].setAttribute("type", "text");
            } else if (PWD_FIELDS[index].getAttribute("type") === "text") {
                PWD_FIELDS[index].setAttribute("type", "password");
            }
        });
    }
} else {
    // Disable password toggling feature and display a console error message
    console.log("ERROR: Number of .password-field elements must be equal to number of .toggle-password-visibility elements. All .toggle-password-visibility elements are disabled.");
}
