// Redirect the user to Login page if the user hasn't logged in
if (localStorage.isLoggedIn === null || localStorage.isLoggedIn === "false") {
    let url = window.location.href;
    url = url.replace("cart/thank-you.php", "account/login");
    window.location.replace(url);
}
