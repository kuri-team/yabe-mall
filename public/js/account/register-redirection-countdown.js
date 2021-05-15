const COUNTDOWN = document.getElementById("redirect-countdown");
let countdownSec = 5;

setInterval(function () {
    COUNTDOWN.innerHTML = `${countdownSec--}`;
}, 1000);

setTimeout(function () {
    let currentLink = window.location.href;
    window.location.href = currentLink.replace("register", "login");
}, 5000);
