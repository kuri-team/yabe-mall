/*
    Toggle visibility of Database Manager forms
 */
const TOGGLE_VIS_BTTNS = document.querySelectorAll(".dtbm-table-title .toggle-visibility");
const TITLES = document.querySelectorAll(".dtbm-table-title");
const FORMS = document.querySelectorAll(".dtbm-form");

TOGGLE_VIS_BTTNS.forEach(function (element, index) {
    // Initial set up
    TITLES[index].setAttribute("style", "");
    FORMS[index].setAttribute("style", "");

    // Visibility toggle logic
    element.addEventListener("click", function () {
        if (TITLES[index].getAttribute("style") === "" && FORMS[index].getAttribute("style") === "") {
            TITLES[index].setAttribute("style", "margin-bottom: 20px; scroll-margin-top: 160px;");
            FORMS[index].setAttribute("style", "display: block; transform-origin: top; animation: fadeInExpand 0.5s;");
        } else {
            TITLES[index].setAttribute("style", "");
            FORMS[index].setAttribute("style", "");
        }
    });
})
