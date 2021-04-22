/**
 * Gallery auto scrolling
 */

const GALLERIES = document.querySelectorAll(".card-gallery");
const GALLERIES_CONTENTS = document.querySelectorAll(".card-gallery-content");
const SCROLL_SPEED = 0.05;
let scrollStatus = [];
let scrollPositions = [];

if (GALLERIES.length === GALLERIES_CONTENTS.length) {
    for (let index = 0; index < GALLERIES.length; index++) {
        // Initializations
        scrollStatus.push(true);
        scrollPositions.push(0);

        // Auto-scrolling
        setInterval(function () {
            if (scrollStatus[index]) {
                GALLERIES_CONTENTS[index].scroll(scrollPositions[index], 0);
                scrollPositions[index]++;
            }
        }, 1 / SCROLL_SPEED);

        // Stop scrolling on mouseover and touch events
        GALLERIES[index].addEventListener("mouseenter", function () {
            scrollStatus[index] = false;
        });

        GALLERIES[index].addEventListener("touchstart", function () {
            scrollStatus[index] = false;
        });

        GALLERIES[index].addEventListener("mouseleave", function () {
            scrollStatus[index] = true;
        });

        GALLERIES[index].addEventListener("touchend", function () {
            scrollStatus[index] = false;
        });
    }
} else {
    console.log("ERROR: .card-gallery does not match .card-gallery-content");
}


/**
 * Gallery infinite scrolling
 */
