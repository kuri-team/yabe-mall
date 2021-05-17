const COUNTDOWN = document.getElementById("redirect-countdown");
const COUNTDOWN_DURATION = 5;
let countdownSec = COUNTDOWN_DURATION;

COUNTDOWN.innerHTML = `${countdownSec}`;
setInterval(function () {
    COUNTDOWN.innerHTML = `${--countdownSec}`;
}, 1000);

setTimeout(function () {
    let currentLink = window.location.href;
    window.location.href = currentLink.replace("register", "login");
}, COUNTDOWN_DURATION * 1000);
