function toggleModalBox(modalBoxId) {
    const PAGE_DIM = document.getElementById("dimmed-page");
    const OVERLAY = document.getElementById("overlay-modal-window");
    const MODAL_BOX = document.getElementById(modalBoxId);

    if (window.getComputedStyle(PAGE_DIM).display === "none") {
    PAGE_DIM.style.display = "block";
    OVERLAY.style.display = "flex";
    MODAL_BOX.style.display = "block";
    } else {
        PAGE_DIM.style.display = "none";
        OVERLAY.style.display = "none";
        MODAL_BOX.style.display = "none";
    }
}
