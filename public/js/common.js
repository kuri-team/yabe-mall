/*
 *
 * common.js
 * YABE common functions. Must be included site-wide at the end of <body></body> in every pages
 * Syntax: <script scr="relative/path/to/public/js/common.js">
 *
 */


/**
 * This function is used to toggle the Mall navbar links on mobile devices
 */
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

document.querySelectorAll(".mobile-menu li").forEach(function (element) {
    element.addEventListener("click", function () {
        window.location.href = element.querySelector("a").href;
    });
});

function scrollToTop() {
    document.body.scrollTop = 0;  // For Safari
    document.documentElement.scrollTop = 0;  // For Chrome, Firefox, IE and Opera
}

/**
 * Go to previous page in browser history
 */
function previousPage() {
    window.history.back();
}


/*
 * Navbar search filter
 */
const NAV_SEARCH_FILTER = document.getElementById("nav-search-filter");
const NAV_SEARCH_FILTER_OPTIONS = document.querySelectorAll(".nav-search-filter-option");
const NAV_SEARCH_FILTER_LEVEL_1 = document.getElementById("nav-search-filter-level-1");
const NAV_SEARCH_FILTER_LEVEL_2_1 = document.getElementById("nav-search-filter-level-2-1");
const NAV_SEARCH_FILTER_LEVEL_2_2 = document.getElementById("nav-search-filter-level-2-2");
let separator = " by ";

// Automatic display, width, and position on mouseover of Navbar Filter
NAV_SEARCH_FILTER.addEventListener("mouseover", function () {
    let width = NAV_SEARCH_FILTER_LEVEL_1.offsetWidth;
    NAV_SEARCH_FILTER_LEVEL_1.setAttribute("style", "display: block; animation: expand-top 0.1s; transform-origin: top;");
    NAV_SEARCH_FILTER_LEVEL_2_1.setAttribute("style", `left: ${width}px;`);
    NAV_SEARCH_FILTER_LEVEL_2_2.setAttribute("style", `left: ${width}px;`);
});

// Auto closing on mouseleave
NAV_SEARCH_FILTER.addEventListener("mouseleave", function () {
    NAV_SEARCH_FILTER_LEVEL_1.setAttribute("style", "display: none");
});

// On user choice, close the menus and add that choice to Navbar Filter
let newFilterTexts = NAV_SEARCH_FILTER.firstChild.nodeValue.split(/\s/);
for (let i = 0; i < NAV_SEARCH_FILTER_OPTIONS.length; i++) {
    let option = NAV_SEARCH_FILTER_OPTIONS.item(i);
    option.addEventListener("click", function (event) {
        if (event.target === option) {
            NAV_SEARCH_FILTER_LEVEL_1.setAttribute("style", "display: none");
            newFilterTexts = [];
        }
        newFilterTexts.unshift(option.innerText.split(/\s/)[0] + " ");
        NAV_SEARCH_FILTER.firstChild.nodeValue = newFilterTexts.join(separator);
    });
}


/**
 * Persistent log in features
 */
if (localStorage["isLoggedIn"] === "true") {
    // Mobile menu display Logged In status
    document.querySelector(".mobile-menu-my-account").setAttribute("style", "display: block;");
    document.querySelector(".mobile-menu-login").setAttribute("style", "display: none;");

    // Check the login status and change Login field to 'My Account'
    const NAV_LOGIN_REG = document.getElementById("nav-login-reg");
    const NAV_MY_ACCOUNT = document.getElementById("nav-my-account");

    if (NAV_LOGIN_REG && NAV_MY_ACCOUNT) {
        NAV_LOGIN_REG.setAttribute("style", "display: none");
        NAV_MY_ACCOUNT.setAttribute("style", "display: block");
    }

    // Redirect to My Account if the user is already logged in and tries to open either Login, Register, or Forgot Password
    let currentURL = window.location.href;
    if (
        currentURL.indexOf("login") !== -1 ||
        currentURL.indexOf("register") !== -1 ||
        currentURL.indexOf("forgot-password") !== -1
    ) {
        // Auto redirect to "My Account" if already logged in
        let myAccountURL = currentURL;
        myAccountURL = myAccountURL.replace("login", "");
        myAccountURL = myAccountURL.replace("register", "");
        myAccountURL = myAccountURL.replace("forgot-password", "");
        myAccountURL += "my-account";
        window.location.replace(myAccountURL);
    }
}


/**
 * Logout mechanism
 */
function logOut() {
    localStorage["isLoggedIn"] = "false";
}


/**
 * Disable cart features when user is not logged in
 */
// Change colors of cart-related buttons to grey
function greyBttn(bttn) {
    bttn.setAttribute("style", "background: #999999");
}

// Functions to display and hide disabled cart message
function displayCartMessage(dimPage, overlay, disabledMsg) {
    dimPage.setAttribute("style", "display: block");
    overlay.setAttribute("style", "display: flex");
    disabledMsg.setAttribute("style", "display: flex");
}

function hideCartMessage(dimPage, overlay, disabledMsg) {
    dimPage.setAttribute("style", "display: none");
    overlay.setAttribute("style", "display: none");
    disabledMsg.setAttribute("style", "display: none");
}

// Disable cart features when clicking buttons
function disableCartBttn(bttn, dimPage, overlay, disabledMsg) {
    bttn.addEventListener("click", function (event) {
        displayCartMessage(dimPage, overlay, disabledMsg);
        setTimeout(function() {
            hideCartMessage(dimPage, overlay, disabledMsg)
        }, 2000);           // Message disappears after 2 seconds
        event.preventDefault();    // Prevent redirection to cart page
    });
}

if (localStorage["isLoggedIn"] !== "true") {
    // Get all cart-related elements
    const PAGE_DIM_CART = document.getElementById("dimmed-page");
    const OVERLAY_CART = document.getElementById("overlay-cart-window");
    const DISABLED_CART_MSG = document.getElementById("disabled-cart-msg");
    const NAV_CART_BTTN = document.querySelector(".nav-cart-bttn");
    const MOBILE_CART = document.querySelector(".mobile-menu-cart");
    const ADD_TO_CART = document.querySelector(".add-to-cart");
    const BUY_NOW = document.querySelector(".buy-now");

    greyBttn(NAV_CART_BTTN);
    greyBttn(MOBILE_CART);

    disableCartBttn(NAV_CART_BTTN, PAGE_DIM_CART, OVERLAY_CART, DISABLED_CART_MSG);
    disableCartBttn(MOBILE_CART, PAGE_DIM_CART, OVERLAY_CART, DISABLED_CART_MSG);

    // Check if page has "add to cart" and "buy now" buttons
    if (ADD_TO_CART && BUY_NOW) {
        greyBttn(ADD_TO_CART);
        greyBttn(BUY_NOW);

        disableCartBttn(ADD_TO_CART, PAGE_DIM_CART, OVERLAY_CART, DISABLED_CART_MSG);
        disableCartBttn(BUY_NOW, PAGE_DIM_CART, OVERLAY_CART, DISABLED_CART_MSG);
    }
}


/**
 * Cookie consent message
 */
const COOKIE_CONSENT = document.querySelector(".cookie-consent");
const ACCEPT_BUTTON = COOKIE_CONSENT.querySelector(".cookie-consent-accept");
const CONSENT_TIMEOUT = 2000;

setTimeout(function () {
    if (document.cookie.indexOf("yabe=yabe-online-mall") === -1) {
        COOKIE_CONSENT.classList.add("active");  // add "active" to activate ".cookie-consent.active"
    } else {
        COOKIE_CONSENT.classList.remove("active");
    }
}, CONSENT_TIMEOUT);

ACCEPT_BUTTON.addEventListener("click", function () {
    document.cookie = "yabe=yabe-online-mall; max-age=60*60*24*30; path=/; SameSite=None; Secure";  // cookie exists for 30 days
    COOKIE_CONSENT.classList.remove("active");
});
