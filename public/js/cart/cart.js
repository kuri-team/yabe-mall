// check if cart has any product
const VIEW_CART_ITEMS = document.querySelector(".cart-body")
const EMPTY_MESSAGE = document.querySelector(".empty-cart")

if (localStorage.length>0){
    VIEW_CART_ITEMS.classList.add("active")
    EMPTY_MESSAGE.classList.add("hide")
}
else {
    VIEW_CART_ITEMS.classList.remove("active")
    EMPTY_MESSAGE.classList.remove("hide")
}

