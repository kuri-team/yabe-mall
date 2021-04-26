/*
* In the current document, if the amount of .toggle-password-visibility elements matches that of .password-field
* elements, then add an eventListener to each .password-field element listening for the "input" event. On that event,
* display the matching .toggle-password-visibility element.
*
* Each .toggle-password-visibility works as a button that listens for "click" event to toggle the .password-field type
* between type="text" and type="password". I.e. toggling the password visibility.
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
    console.log("ERROR: Number of .password-field elements must be equal to number of .toggle-password-visibility elements");
}
