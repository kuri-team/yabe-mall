// Display file upload field when user clicks on #register-avatar img
const AVATAR_AREA = document.querySelector("#register-avatar .avatar-img");
const EDIT_ICON = document.querySelector("#register-avatar .edit-icon");
const UPLOAD_FIELD = document.getElementById("register-avatar-upload-field");
const DISPLAY_ATTRIBUTE = "display: flex; animation: expand-top 0.45s; transform-origin: top;";

AVATAR_AREA.addEventListener("click", function () {
    if (UPLOAD_FIELD.getAttribute("style") === DISPLAY_ATTRIBUTE) {
        UPLOAD_FIELD.setAttribute("style", "display: none");
        EDIT_ICON.setAttribute("style", "");
        EDIT_ICON.lastChild.textContent = " Edit";
    } else {
        UPLOAD_FIELD.setAttribute("style", DISPLAY_ATTRIBUTE);
        EDIT_ICON.setAttribute("style", "display: block;");
        EDIT_ICON.lastChild.textContent = " Cancel";
    }
});


// Display store owner only fields when appropriate radio box is checked
const STORE_OWNER_ONLY_FIELDS = document.getElementById("store-owner-only");
const RADIO_STORE_OWNER = document.getElementById("store-owner");
const CAPTURE_AREA = document.getElementById("register-account-type-capture-area");

CAPTURE_AREA.addEventListener("click", function () {
    if (RADIO_STORE_OWNER.checked) {
        STORE_OWNER_ONLY_FIELDS.setAttribute("style", "display: block; animation: expand-top 0.45s; transform-origin: top;");
    } else {
        STORE_OWNER_ONLY_FIELDS.setAttribute("style", "display: none;");
    }
});


const SUBMIT_BTTN = document.querySelector(".register-form input[type='submit']");
const REGISTER_ITEMS = document.querySelectorAll(".register-item");
for (let index = 0; index < REGISTER_ITEMS.length; index++) {
    // Get the matching input and its label
    const INPUT = REGISTER_ITEMS[index].querySelector("input") || REGISTER_ITEMS[index].querySelector("select");
    const LABEL = REGISTER_ITEMS[index].querySelector("label");

    // Automatic focus to input fields when the wrapper field (.register-item) is in focus
    REGISTER_ITEMS[index].addEventListener("click", function () {
        INPUT.focus();
    });

    if (INPUT.type !== "password") {  // Workaround: Disable highlighting for password fields. Right now it would raise a bug on firefox: https://github.com/kuri-team/yabe-online-mall/issues/67#issue-880275945
        INPUT.addEventListener("input", function () {
            highlightInvalidField(REGISTER_ITEMS[index], INPUT, LABEL);
        });
    }
}

SUBMIT_BTTN.addEventListener("click", function () {
    for (let index = 0; index < REGISTER_ITEMS.length; index++) {
        // Get the matching input and its label
        const INPUT = REGISTER_ITEMS[index].querySelector("input") || REGISTER_ITEMS[index].querySelector("select");
        const LABEL = REGISTER_ITEMS[index].querySelector("label");
        highlightInvalidField(REGISTER_ITEMS[index], INPUT, LABEL);
    }
});

// Invalid fields highlighting
function highlightInvalidField(registerItem, inputElement, labelElement) {
    if (inputElement.required) {
        if (!inputElement.validity.valid || inputElement.value === "" || inputElement.value === undefined) {
            registerItem.setAttribute("style", "background: #ffdddd");
            labelElement.setAttribute("style", "color: #ff2222");
        } else {
            registerItem.setAttribute("style", "");
            labelElement.setAttribute("style", "");
        }
    }
}


// Validator Object
function Validator(object) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var selectorRules = {};

    // validating function
    function validate(inputElement, rule) {
        let errorElement = getParent(inputElement, object.formGroupSelector).querySelector(object.errorSelector);
        let messageError;

        // get rules from selector
        let rules = selectorRules[rule.selector];

        // Looping through rules to check (existing error = stop looping)
        for (let i = 0; i < rules.length; ++i) {
            switch (inputElement.type) {
                case "radio":
                case "checkbox":
                    messageError = rules[i](
                        formInput.querySelector(rule.selector + ":checked")
                    );
                    break;
                default:
                    messageError = rules[i](inputElement.value);
            }
            if (messageError) break;
        }

        if (messageError) {
            errorElement.innerText = messageError;
            getParent(inputElement, object.formGroupSelector).classList.add("invalid");
        } else {
            errorElement.innerText = "";
            getParent(inputElement, object.formGroupSelector).classList.remove("invalid");
        }

        return !messageError;
    }

    // get element from forms that requires validation
    let formInput = document.querySelector(object.form);
    if (formInput) {
        // Register form
        formInput.onsubmit = function (e) {
            alert("Your register form is successfully submitted");
            e.preventDefault();

            let isFormValid = true;

            // Loop through rules and validate
            object.rules.forEach(function (rule) {
                let inputElement = formInput.querySelector(rule.selector);
                let isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            });

            if (isFormValid) {
                // Register
                if (typeof object.onSubmit === "function") {
                    let enterInput = formInput.querySelectorAll("[name]");
                    let inputForm = Array.from(enterInput).reduce(function (values, input) {

                        switch(input.type) {
                            case "radio":
                                values[input.name] = formInput.querySelector("input[name=' + input.name + ']:checked").value;
                                break;
                            case "checkbox":
                                if (!input.matches(":checked")) {
                                    values[input.name] = "";
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case "file":
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                        }

                        return values;
                    }, {});
                    object.onSubmit(inputForm);
                }
                // default submit
                else {
                    formInput.submit();
                }
            }
        }

        // looping through the requirements (listen to event: blur, input, ...)
        object.rules.forEach(function (rule) {

            // Save rules each input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            let inputElements = formInput.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function (inputElement) {
                // Move the mouse out of the input form behavior
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }

                // Entering input behavior
                inputElement.oninput = function () {
                    let errorElement = getParent(inputElement, object.formGroupSelector).querySelector(object.errorSelector);
                    errorElement.innerText = "";
                    getParent(inputElement, object.formGroupSelector).classList.remove("invalid");
                }
            });
        });
    }

}


//  Invalid input => return error message
//  Valid input => return nothing
Validator.required = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined :  message || "Please enter this field"
        }
    };
}

Validator.email = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^(([a-zA-Z0-9][.]?){2,}|([a-zA-Z0-9]\.)+)([a-zA-Z0-9]|(?!\.))+?[a-zA-Z0-9][@](?=[^.])[a-zA-Z0-9.]+[.][a-zA-Z]{2,5}$/;
            EMAIL.style.borderColor = "red";
            return regex.test(value) ? undefined :  message || "Valid email has the form [name]@[domain]";
        }
    };
}

Validator.phone = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^([0-9][-. ]?){8,10}[0-9]$/;
            return regex.test(value) ? undefined :  message || "Valid phone contains 9 to 11 digits which space, dot, and dash cannot be positioned at the beginning or at the end";
        }
    };
}

Validator.pwd = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$/;
            return regex.test(value) ? undefined : message || "Please enter a valid password";
        }
    };
}

Validator.zipcode = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^[0-9]{4,6}$/;
            return regex.test(value) ? undefined :  message || "Valid Zipcode contains 4 to 6 digits.";
        }
    };
}

Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined :  message || `PLease enter at least ${min} characters`;
        }
    };
}

Validator.verified = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmValue() ? undefined : message || "Invalid input";
        }
    }
}

document.addEventListener("input", function () {
    // Input form expected to be validated
    Validator({
        form: "#register-form",
        formGroupSelector: ".input-field-validation",
        errorSelector: ".message-error",
        rules: [
            Validator.required("#fname", "Please enter your first name"),
            Validator.required("#lname", "Please enter your last name"),
            Validator.email("#email"),
            Validator.minLength("#fname", 3),
            Validator.minLength("#lname", 3),
            Validator.minLength("#address", 3),
            Validator.minLength("#city", 3),
            Validator.zipcode("#zipcode"),
            Validator.phone("#phone"),
            Validator.required("#verify-pwd"),
            Validator.pwd("#pwd"),
            Validator.verified("#verify-pwd", function () {
                return document.querySelector("#register-form #pwd").value;
            }, "Password does not match")
        ],
    });
});
