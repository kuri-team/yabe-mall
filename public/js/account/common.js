const PWD_VIS_TOGGLES = document.querySelectorAll(".toggle-password-visibility");
const PWD_FIELDS = document.querySelectorAll(".password-field");

if (PWD_FIELDS.length === PWD_VIS_TOGGLES.length) {
    for (let index = 0; index < PWD_FIELDS.length; index++) {
        PWD_FIELDS[index].addEventListener("input", function () {
            PWD_VIS_TOGGLES[index].setAttribute("style", "display: inline;");
        });
    }

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
    console.log("ERROR: Number of .password-field elements must be equal to number of .toggle-password-visibility elements");
}
