const CORRECT_PWD = "password";
const LOGIN_FORM = document.getElementById("login-form");

// Check entered password with correct password
LOGIN_FORM.addEventListener("submit", function () {
    // Get password, wrong password message values, wrong pwd message styles
    const ENTERED_PWD = LOGIN_FORM.password.value;
    const WRONG_PWD_MSG = document.getElementById("wrong-pwd");
    const MSG_STYLE = window.getComputedStyle(WRONG_PWD_MSG);

    if (ENTERED_PWD !== CORRECT_PWD) {
        MSG_STYLE.display = "block";
        return false;
    } else {
        return true;
    }
})

