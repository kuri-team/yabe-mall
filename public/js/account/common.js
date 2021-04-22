const PWD_VIS_TOGGLE = document.querySelector(".toggle-password-visibility");
const PWD_FIELD = document.getElementById("password");

PWD_FIELD.addEventListener("input", function () {
    PWD_VIS_TOGGLE.setAttribute("style", "display: inline;");
});

PWD_VIS_TOGGLE.addEventListener("click", function () {
    if (PWD_FIELD.getAttribute("type") === "password") {
        PWD_FIELD.setAttribute("type", "text");
    } else if (PWD_FIELD.getAttribute("type") === "text") {
        PWD_FIELD.setAttribute("type", "password");
    }
});
