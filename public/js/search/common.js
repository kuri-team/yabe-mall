const SEARCH_FORM = document.getElementById("nav-search-form");
const SEARCH_BTTN = document.getElementById("nav-search-bttn");
const SEARCH_FILTER = document.getElementById("nav-search-filter");

if (SEARCH_FORM !== undefined && SEARCH_BTTN !== undefined && NAV_SEARCH_FILTER !== undefined) {
    SEARCH_BTTN.addEventListener("click", function () {
        SEARCH_FORM.submit();
    });

    SEARCH_FORM.addEventListener("submit", function () {
        let regExPattern = /(^\s+)|(\s+$)|(?<=\s)\s/g; // Remove all unnecessary whitespaces
        document.getElementById("nav-search-filter-input").value = SEARCH_FILTER.firstChild.textContent.replace(regExPattern, "");
    });
}
