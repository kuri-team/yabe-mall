let productID = window.location.pathname.split('/')[5];
let productName = document.querySelector(".product-info-main h2").innerHTML;
let productLink = window.location.href;
let storeName = document.querySelector(".product-info-main p").innerHTML;
let finalPrice = parseFloat(document.querySelector(".product-info-price").innerHTML.slice(1,));
let productImg = document.querySelector(".product-info-main-img img").src;
let cartItem = {
    "product_ID": productID,
    "product_name": productName,
    "product_Link": productLink,
    "store_name": storeName,
    "final_price": finalPrice,
    "product_img": productImg,
    "product_quantity": 0
};

const BUY_NOW_BUTTON = document.querySelector(".buy-now");
const ADD_BUTTON = document.querySelector(".add-to-cart");
ADD_BUTTON.addEventListener("click", addItemToCart);
BUY_NOW_BUTTON.addEventListener("click", function (){
    addItemToCart();
    window.location.href = BUY_NOW_BUTTON.querySelector("a").href;
});

function addItemToCart() {
    let cartProducts = localStorage.getItem("cartProducts");
    cartProducts = JSON.parse(cartProducts);

    if(cartProducts != null) {
        if(cartProducts[productID] === undefined) {
            cartProducts = {
                ...cartProducts, // for product that is added 1st time
                [productID]: cartItem
            };
        }
        cartProducts[productID].product_quantity += 1; // for products that are already in cart
    } else { //
        cartItem.product_quantity= 1;
        cartProducts = {
            [productID]: cartItem // for empty cart
        };
    }

    localStorage.setItem("cartProducts", JSON.stringify(cartProducts));
    addToCartMsg();
}

function addToCartMsg () {
    let msg = document.getElementById("product-content");
    let msgOnTop =
        `<div class="done-msg">
            <i class="fas fa-check"></i>
            <p class="done-add-to-cart">Product has been added to the cart</p>
        </div>`
    msgOnTop += msg.innerHTML
    msg.innerHTML = msgOnTop;
    setTimeout(function() {
        const doc = document.querySelector("main");
        const doneMsg = document.querySelector(".done-msg");
        doc.removeChild(doneMsg);
    },2000)
    setTimeout(function() {
        location.reload()
    },1000)
}