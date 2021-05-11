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
