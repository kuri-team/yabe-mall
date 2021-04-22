/**
 * Gallery auto scrolling
 */

const GALLERIES = document.querySelectorAll(".card-gallery");
const GALLERIES_LEFT_BTTNS = document.querySelectorAll(".card-gallery-left-bttn");
const GALLERIES_RIGHT_BTTNS = document.querySelectorAll(".card-gallery-right-bttn");
const GALLERIES_CONTENTS = document.querySelectorAll(".card-gallery-content");
const DEFAULT_SCROLL_SPEED = 0.05;
const FAST_SCROLL_SPEED = 50;
const DEFAULT_SCROLL_DIR = 1;


if (GALLERIES.length === GALLERIES_CONTENTS.length &&
    GALLERIES_LEFT_BTTNS.length === GALLERIES.length &&
    GALLERIES_RIGHT_BTTNS.length === GALLERIES.length
) {
    let scrollDir = DEFAULT_SCROLL_DIR
    let scrollStatus = [];
    let scrollFastStatus = [];
    let scrollPositions = [];
    for (let index = 0; index < GALLERIES.length; index++) {
        // Initializations
        scrollStatus.push(true);
        scrollFastStatus.push(false);
        scrollPositions.push(0);


        // Auto-scrolling
        setInterval(function () {
            if (scrollStatus[index]) {
                GALLERIES_CONTENTS[index].scroll(scrollPositions[index], 0);
                scrollPositions[index] += scrollDir;
            }
        }, 1 / DEFAULT_SCROLL_SPEED);


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


        // Gallery buttons behavior
        setInterval(function () {
            if (scrollFastStatus[index]) {
                GALLERIES_CONTENTS[index].scroll(scrollPositions[index], 0);
                scrollPositions[index] += scrollDir;
            }
        }, 1 / FAST_SCROLL_SPEED);

        GALLERIES_LEFT_BTTNS[index].addEventListener("mousedown", function () {
            scrollFastStatus[index] = true;
            scrollDir = -1;
        });

        GALLERIES_LEFT_BTTNS[index].addEventListener("mouseup", function () {
            scrollFastStatus[index] = false;
            scrollDir = DEFAULT_SCROLL_DIR;
        });

        GALLERIES_RIGHT_BTTNS[index].addEventListener("mousedown", function () {
            scrollFastStatus[index] = true;
            scrollDir = 1;
        });

        GALLERIES_RIGHT_BTTNS[index].addEventListener("mouseup", function () {
            scrollFastStatus[index] = false;
            scrollDir = DEFAULT_SCROLL_DIR;
        });
    }
} else {
    console.log("ERROR: Card gallery elements does not match each other");
}


/**
 * Gallery infinite scrolling
 */
