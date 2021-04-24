function toggleModalBox(modalBoxId) {
    const PAGEDIM = document.getElementById("dimmed-page");
    const OVERLAY = document.getElementById("overlay-modal-window");
    let modalBox = document.getElementById(modalBoxId);

    if (window.getComputedStyle(PAGEDIM).display === "none") {
    PAGEDIM.style.display = "block";
    OVERLAY.style.display = "flex";
    modalBox.style.display = "block";
    } else {
        PAGEDIM.style.display = "none";
        OVERLAY.style.display = "none";
        modalBox.style.display = "none";
    }
}
