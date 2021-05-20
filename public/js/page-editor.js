const EDIT_TAB_CONTROL = document.getElementById("page-editor-tab-edit");
const EDIT_TAB_AREA = document.getElementById("page-editor-textarea");
const PREVIEW_TAB_CONTROL = document.getElementById("page-editor-tab-preview");
const PREVIEW_TAB_AREA = document.getElementById("page-editor-preview");


// Toggling behavior between edit and preview tab
EDIT_TAB_CONTROL.addEventListener("change", function () {
    if (EDIT_TAB_CONTROL.checked && !PREVIEW_TAB_CONTROL.checked) {
        EDIT_TAB_AREA.setAttribute("style", "display: block;");
        PREVIEW_TAB_AREA.setAttribute("style", "display: none;");
    } else {
        EDIT_TAB_AREA.setAttribute("style", "display: none;");
        PREVIEW_TAB_AREA.setAttribute("style", "display: block;");
    }
});

PREVIEW_TAB_CONTROL.addEventListener("change", function () {
    if (PREVIEW_TAB_CONTROL.checked && !EDIT_TAB_CONTROL.checked) {
        EDIT_TAB_AREA.setAttribute("style", "display: none;");
        PREVIEW_TAB_AREA.setAttribute("style", "display: block;");
    } else {
        EDIT_TAB_AREA.setAttribute("style", "display: block;");
        PREVIEW_TAB_AREA.setAttribute("style", "display: none;");
    }
});


// Render preview content from editor textarea HTML
PREVIEW_TAB_AREA.innerHTML = EDIT_TAB_AREA.value;
EDIT_TAB_AREA.addEventListener("input", function () {
    PREVIEW_TAB_AREA.innerHTML = EDIT_TAB_AREA.value;
});
