function displayModalBox(modalBoxId) {
    const PAGEDIM = document.getElementById("dimmed-page");
    const OVERLAY = document.getElementById("overlay-modal-window");
    let modalBox = document.getElementById(modalBoxId);

    PAGEDIM.style.display = "block";
    OVERLAY.style.display = "flex";
    modalBox.style.display = "block";
}