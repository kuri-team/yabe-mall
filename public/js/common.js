function toggleMobileMenu() {
    const ICON = document.getElementById("mobile-menu-icon");
    const MENU = document.getElementById("mobile-menu");

    if (window.getComputedStyle(MENU).display === "none") {
        ICON.setAttribute("class", "fas fa-times");
        MENU.setAttribute("style", "display: block; animation: expand-top 0.4s;");
    } else {
        ICON.setAttribute("class", "fas fa-bars");
        MENU.setAttribute("style", "display: none;");
    }
}

function previousPage() {
    window.history.back();
}
