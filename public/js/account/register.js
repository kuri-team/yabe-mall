// Display file upload field when user clicks on #register-avatar img
const AVATAR_AREA = document.querySelector("#register-avatar img");
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
