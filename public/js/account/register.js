const STORE_OWNER_ONLY_FIELDS = document.getElementById("store-owner-only");
const RADIO_STORE_OWNER = document.getElementById("store-owner");
const CAPTURE_AREA = document.getElementById("register-account-type-capture-area");

CAPTURE_AREA.addEventListener("click", function () {
    if (RADIO_STORE_OWNER.checked) {
        STORE_OWNER_ONLY_FIELDS.setAttribute("style", "display: initial; animation: expand-top 10s; transform-origin: top;");
    } else {
        STORE_OWNER_ONLY_FIELDS.setAttribute("style", "display: none;");
    }
});
