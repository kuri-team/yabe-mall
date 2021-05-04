// localStorage initialization
if (localStorage.getItem("isLoggedIn") === null) {
    localStorage.setItem("isLoggedIn", "false");
}

const CORRECT_PWD = "password";
const LOGIN_FORM = document.getElementById("login-form");

// Check entered password with correct password
LOGIN_FORM.addEventListener("submit", function (event) {
    // Get email and password values, and wrong password message
    const ENTERED_EMAIL = LOGIN_FORM.username.value;
    const ENTERED_PWD = LOGIN_FORM.password.value;
    const WRONG_PWD_MSG = document.getElementById("wrong-pwd");

    // Set email value as local storage item
    localStorage.setItem("email", ENTERED_EMAIL);

    if (ENTERED_PWD !== CORRECT_PWD) {
        // Display wrong password message
        WRONG_PWD_MSG.setAttribute("style", "display: block");
        event.preventDefault();   // Stop form from submitting
        return false;
    } else {
        // Set login status to 'true'
        localStorage["isLoggedIn"] = "true";
        return true;
    }
})

