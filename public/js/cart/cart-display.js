const VIEW_CART_ITEMS = document.querySelector(".cart-body");
const EMPTY_MESSAGE = document.querySelector(".empty-cart");

// check if cart has any product
if (localStorage.getItem("cartProducts") != null){
    VIEW_CART_ITEMS.classList.add("active");
    EMPTY_MESSAGE.classList.remove("active");
    listItemInCart();
} else {
    VIEW_CART_ITEMS.classList.remove("active");
    EMPTY_MESSAGE.classList.add("active");
}

// input <li> to list the products
function  listItemInCart() {
    let productList = localStorage.getItem("cartProducts");
    productList = JSON.parse(productList);
    let productTable = document.querySelector(".cart-product-table");
    Object.values(productList).map(function(item) { //for each product, insert <li> to html
        productTable.innerHTML += `
            <li class="cart-product" id="${item.product_ID}">
                <div class="cart-img">
                  <a href="../../store/store-template/product-detail/"><img alt="image of a product" src="${item.product_img}"></a>
                </div>
                <div class="cart-product-details">
                  <a class="cart-product-title" href="${item.product_Link}">${item.product_name}</a>
                  <a class="cart-product-shop" href="../../store/store-template/">${item.store_name}</a>
                  <p class="cart-product-price-crossed-out"></p>
                  <p class="cart-product-price">${item.final_price}</p>
                <div class="cart-product-quantity">
                    <button class="cart-product-quantity-button minus" id="minus-button"><i class="fas fa-minus"></i></button>
                    <label><input class="cart-product-quantity-input" id="${item.product_ID} product-quantity" type="number" value="${item.product_quantity}" min=0></label>
                    <button class="cart-product-quantity-button plus" id="plus-button"><i class="fas fa-plus"></i></button>
                 </div>
                </div>

                <div class="cart-product-remove">
                  <button class="cart-product-remove-button">REMOVE</button>
                </div>
              </li>`;
    })
}

// change quantity with + - buttons
// + button: update current quantity on the page and local storage
document.querySelectorAll(".cart-product-quantity-button.plus").forEach(function (item) {
    item.addEventListener("click", function() {
    let productList = localStorage.getItem("cartProducts"); // local storage
    productList = JSON.parse(productList);
    let productID = item.parentNode.parentNode.parentNode.id;
    productList[productID].product_quantity+=1;
    localStorage.setItem("cartProducts",JSON.stringify(productList));
    let inputValue = document.getElementById(`${ productID } product-quantity`).value; // page
    let productQuantity = parseInt(inputValue)
    productQuantity += 1;
    document.getElementById(`${ productID } product-quantity`).value = productQuantity;
});
});

//- button:  update current quantity on the page and local storage
document.querySelectorAll(".cart-product-quantity-button.minus").forEach(function (item) {
    item.addEventListener("click", function() {
        let productList = localStorage.getItem("cartProducts"); //local storage
        productList = JSON.parse(productList);
        let productID = this.parentNode.parentNode.parentNode.id;
        productList[productID].product_quantity -= 1;
        if ( productList[productID].product_quantity < 1){
            productList[productID].product_quantity = 1
        }
        localStorage.setItem("cartProducts", JSON.stringify(productList));

        let inputValue = document.getElementById(`${productID} product-quantity`).value; // page
        let productQuantity = parseInt(inputValue)
        productQuantity -= 1;
        if (productQuantity < 1){
            productQuantity = 1
        }
        document.getElementById(`${productID} product-quantity`).value = productQuantity;
    });
});
