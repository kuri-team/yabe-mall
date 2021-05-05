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

// Automatic focus to input fields when the wrapper field (.register-item) is in focus
const REGISTER_ITEMS = document.querySelectorAll(".register-item");
for (let index = 0; index < REGISTER_ITEMS.length; index++) {
    REGISTER_ITEMS[index].addEventListener("click", function () {
        const INPUT = REGISTER_ITEMS[index].querySelector("input") || REGISTER_ITEMS[index].querySelector("select");
        INPUT.focus();
    });
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
                case 'radio':
                case 'checkbox':
                    messageError = rules[i](
                        formInput.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    messageError = rules[i](inputElement.value);
            }
            if (messageError) break;
        }

        if (messageError) {
            errorElement.innerText = messageError;
            getParent(inputElement, object.formGroupSelector).classList.add('invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, object.formGroupSelector).classList.remove('invalid');
        }

        return !messageError;
    }

    // get element from forms that requires validation
    let formInput = document.querySelector(object.form);
    if (formInput) {
        // Submit form
        formInput.onsubmit = function (e) {
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
                // Submit
                if (typeof object.onSubmit === 'function') {
                    let enterInput = formInput.querySelectorAll('[name]');
                    let inputForm = Array.from(enterInput).reduce(function (values, input) {

                        switch(input.type) {
                            case 'radio':
                                values[input.name] = formInput.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    values[input.name] = '';
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
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
                    errorElement.innerText = '';
                    getParent(inputElement, object.formGroupSelector).classList.remove('invalid');
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
            return value ? undefined :  message || 'Please enter this field'
        }
    };
}

Validator.email = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*){2,}|(.+){2,})@(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,5})$/;
            return regex.test(value) ? undefined :  message || 'Valid email has the form [name]@[domain]';
        }
    };
}

Validator.phone = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^([0-9][-. ]?){8,10}[0-9]$/;
            return regex.test(value) ? undefined :  message || 'Valid phone contains 9 to 11 digits which space, dot, and dash cannot be positioned at the beginning or at the end';
        }
    };
}

Validator.pwd = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
            return regex.test(value) ? undefined :  message || 'Please enter a valid password';
        }
    };
}

Validator.zipcode = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^[0-9]{4,6}$/;
            return regex.test(value) ? undefined :  message || 'Valid Zipcode contains 4 to 6 digits.';
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
            return value === getConfirmValue() ? undefined : message || 'Invalid input';
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // Input form expected to be validated
    Validator({
        form: '#register-form',
        formGroupSelector: '.input-field-validation',
        errorSelector: '.message-error',
        rules: [
            Validator.required('#fname', 'Please enter your first name'),
            Validator.required('#lname', 'Please enter your last name'),
            Validator.email('#email'),
            Validator.minLength('#fname', 3),
            Validator.minLength('#lname', 3),
            Validator.minLength('#address', 3),
            Validator.minLength('#city', 3),
            Validator.zipcode('#zipcode'),
            Validator.phone('#phone'),
            Validator.required('#verify-pwd'),
            Validator.pwd('#pwd'),
            Validator.verified('#verify-pwd', function () {
                return document.querySelector('#register-form #pwd').value;
            }, 'Password does not match')
        ],
    });
});


// Form validation
const FORM = document.getElementById("register-form");

FORM.addEventListener("submit", function(event) {

    // Get form values
    const FORM = document.getElementById("contact-form")
    const EMAIL_CONSOLE_ALERT = FORM.email_add.value;
    const PHONE_CONSOLE_ALERT = FORM.phone_num.value;
    const PASSWORD_CONSOLE_ALERT = FORM.pwd.value;
    const RETYPE_PASSWORD_CONSOLE_ALERT = FORM.verify-pwd.value;
    const FIRST_NAME_CONSOLE_ALERT = FORM.fname.value;
    const LAST_NAME_CONSOLE_ALERT = FORM.lname.value;
    const ADDRESS_CONSOLE_ALERT = FORM.address.value;
    const CITY_CONSOLE_ALERT = FORM.city.value;
    const ZIP_CODE_CONSOLE_ALERT = FORM.zipcode.value;


    // Create RegExp patterns
    const REGEX_EMAIL_CONSOLE_ALERT = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*){2,}|(.+){2,})@(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,5})$/;
    const REGEX_PHONE_CONSOLE_ALERT = /^([0-9][-. ]?){8,10}[0-9]$/;
    const REGEX_PASSWORD_CONSOLE_ALERT = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
    const REGEX_ZIP_CODE_CONSOLE_ALERT = /^[0-9]{4,6}$/;


    // Variables
    let err = "";  // err variable is used to show error message.
    let errNum = 0;  // errNum variable is used to show error index

    // Logic
    if (EMAIL_CONSOLE_ALERT === "") {
        // If you don't Enter anything in Email field than show error(Enter Email)
        errNum++;
        err += errNum + ". Enter Email.\n";
    } else {
        // If you don't Enter Email address in email pattern format (i already described "REGEX_EMAIL_CONSOLE_ALERT") then see error (Invalid Email)
        if(!REGEX_EMAIL_CONSOLE_ALERT.test(EMAIL_CONSOLE_ALERT)){
            errNum++;
            err += errNum + ". Invalid Email. Valid email has the form [name]@[domain]\n";
        }
    }

    if (PHONE_CONSOLE_ALERT === "") {
        // If you don't Enter anything in Email field than show error(Enter Email)
        errNum++;
        err += errNum + ". Enter Your Phone number.\n";
    } else {
        // If you don't Enter Email address in email pattern format (i already described "REGEX_EMAIL_CONSOLE_ALERT") then see error (Invalid Email)
        if(!REGEX_PHONE_CONSOLE_ALERT.test(PHONE_CONSOLE_ALERT)){
            errNum++;
            err += errNum + ". Invalid phone number. Valid phone number contains 9 to 11 digits. Space, dot, and dash cannot be positioned at the beginning or at the end of a phone. Furthermore, they cannot be positioned next to each other. \n";
        }
    }

    if (PASSWORD_CONSOLE_ALERT === "") {
        // If you don't Enter anything in pw field than show error(Enter pw)
        errNum++;
        err += errNum + ". Enter Password.\n";
    } else {
        // If you don't Enter pw in pw pattern format then see error
        if(!REGEX_PASSWORD_CONSOLE_ALERT.test(PASSWORD_CONSOLE_ALERT)){
            errNum++;
            err += errNum + ". Invalid Password. Valid Password contains 8 to 20 characters, no space, with at least 1 lower case letter, at least 1 upper case letter, at least 1 digit, and at least 1 special character in the set !@#$%^&*\n";
        }
    }

    if (RETYPE_PASSWORD_CONSOLE_ALERT !== PASSWORD_CONSOLE_ALERT) {
        // If you don't Enter anything in pw field than show error(Enter pw)
        errNum++;
        err += errNum + ". Enter Retype password.\n";
    } else {
        // If you don't Enter pw in pw pattern format then see error
        if(!REGEX_RETYPE_PASSWORD_CONSOLE_ALERT.test(RETYPE_PASSWORD_CONSOLE_ALERT)){
            errNum++;
            err += errNum + ". Invalid Retype password. Valid Retype password contains the same value as Password.\n";
        }
    }

    if (FIRST_NAME_CONSOLE_ALERT === "" || FIRST_NAME_CONSOLE_ALERT.length < 3) {
        // Checks the value: If Value empty  or value length less than 3 or value is digit than Show error Invalid Name
        errNum++;
        err += errNum + ". Invalid first name. Valid first name contains at least 3 characters.\n";
    }

    if (LAST_NAME_CONSOLE_ALERT === "" || LAST_NAME_CONSOLE_ALERT.length < 3) {
        errNum++;
        err += errNum + ". Invalid last name. Valid last name contains at least 3 characters.\n";
    }

    if (ADDRESS_CONSOLE_ALERT === "" || ADDRESS_CONSOLE_ALERT.length < 3) {
        // Checks the value: If Value empty  or value length less than 3 or value is digit than Show error Invalid Name
        errNum++;
        err += errNum + ". Invalid Address. Valid Address contains at least 3 characters.\n";
    }

    if (CITY_CONSOLE_ALERT === "" || CITY_CONSOLE_ALERT.length < 3) {
        // Checks the value: If Value empty  or value length less than 3 or value is digit then show error
        errNum++;
        err += errNum + ". Invalid city. Valid city contains at least 3 characters.\n";
    }

    if (ZIP_CODE_CONSOLE_ALERT === "" || !REGEX_ZIP_CODE_CONSOLE_ALERT.test(ZIP_CODE_CONSOLE_ALERT)) {
        // Check the zip code number : If zip code number is empty or value length does not contain 4 to 6 digits. or is not a null then show error
        errNum++;
        err += errNum + ". Invalid zip code. Valid Zipcode contains 4 to 6 digits.\n";
    }

    if (errNum>0) {
        // If errNum is greater than 0 than alert error and return "false"
        alert(err);
        event.preventDefault();
        return false;
    } else {
        // If errNum is less than 0 or 0 than alert "done" and return "true"
        alert("Your register form is successfully submitted");
        return true;
    }
});
