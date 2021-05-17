const LOGIN_URL = document.querySelector(".submit-feedback-valid a").href;
const COUNTDOWN = document.getElementById("redirect-countdown");
const COUNTDOWN_DURATION = 5;
let countdownSec = COUNTDOWN_DURATION;

console.log(LOGIN_URL);

COUNTDOWN.innerHTML = `${countdownSec}`;
setInterval(function () {
    COUNTDOWN.innerHTML = `${--countdownSec}`;
}, 1000);

setTimeout(function () {
    window.location.href = LOGIN_URL;
}, COUNTDOWN_DURATION * 1000);
