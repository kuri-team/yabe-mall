const SEARCH_FORM = document.getElementById("nav-search-form");
const SEARCH_BTTN = document.getElementById("nav-search-bttn");
const SEARCH_FILTER = document.getElementById("nav-search-filter");
const REGEX_UNNECESSARY_WHITESPACES = /(^\s+)|(\s+$)|(?<=\s)\s/g;  // Regular expression pattern to find all unnecessary whitespaces

if (SEARCH_FORM !== undefined && SEARCH_BTTN !== undefined && NAV_SEARCH_FILTER !== undefined) {
    SEARCH_BTTN.addEventListener("click", function () {
        document.getElementById("nav-search-filter-input").value = SEARCH_FILTER.firstChild.textContent.replace(REGEX_UNNECESSARY_WHITESPACES, "");
        SEARCH_FORM.submit();
    });

    SEARCH_FORM.addEventListener("submit", function () {
        document.getElementById("nav-search-filter-input").value = SEARCH_FILTER.firstChild.textContent.replace(REGEX_UNNECESSARY_WHITESPACES, "");
    });
}
