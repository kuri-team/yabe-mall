const CORRECT_PWD = "password";
const LOGIN_FORM = document.getElementById("login-form");

// Check entered password with correct password
LOGIN_FORM.addEventListener("submit", function () {
    // Get password value and wrong password message
    const ENTERED_PWD = LOGIN_FORM.password.value;
    const WRONG_PWD_MSG = document.getElementById("wrong-pwd");

    if (ENTERED_PWD !== CORRECT_PWD) {
        // Display wrong password message
        WRONG_PWD_MSG.setAttribute("style", "display: block");
        event.preventDefault();   // Stop form from submitting
        return false;
    } else {
        return true;
    }
})

