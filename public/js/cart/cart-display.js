const VIEW_CART_ITEMS = document.querySelector(".cart-body");
const EMPTY_MESSAGE = document.querySelector(".empty-cart");

// clear the localStorage if all items has been removed
if (localStorage.getItem("cartProducts") === "{}") {
    localStorage.removeItem("cartProducts")
}

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
// store subTotal and totalPrice in localStorage for updating totalPrice whenever a plus or minus button is clicked
function  listItemInCart() {
    let productList = localStorage.getItem("cartProducts");
    productList = JSON.parse(productList);
    let productTable = document.querySelector(".cart-product-table");
    let subTotal = 0;
    let deliveryCharge = document.querySelector(".cart-product-delivery .cart-product-total-fee").innerHTML;
    deliveryCharge = deliveryCharge.replace("$","");
    deliveryCharge = parseFloat(deliveryCharge);
    Object.values(productList).map(function(item) { //for each product, insert <li> to html
        productTable.innerHTML += `
            <li class="cart-product" id="${item.product_ID}">
                <div class="cart-img">
                  <a href="${item.product_Link}"><img alt="image of a product" src="${item.product_img}"></a>
                </div>
                <div class="cart-product-details">
                  <a class="cart-product-title" href="${item.product_Link}">${item.product_name}</a>
                  <a class="cart-product-shop" href="../../store/store-template/">${item.store_name}</a>
                  <p class="cart-product-price-crossed-out"></p>
                  <p class="cart-product-price">$${item.final_price}</p>
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
        subTotal += item.product_quantity * item.final_price;
        subTotal = parseFloat(subTotal.toFixed(2));
        localStorage.setItem("subTotal", JSON.stringify(subTotal));
    })
    let totalPrice = subTotal + deliveryCharge;
    localStorage.setItem("totalPrice",totalPrice);
    let displaySubTotal = document.querySelector(".cart-product-total .cart-product-total-fee");
    let displayTotalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
    subTotal = localStorage.getItem("subTotal");
    totalPrice = localStorage.getItem("totalPrice");
    displaySubTotal.innerHTML = "$"+subTotal;
    displayTotalPrice.innerHTML = "$"+totalPrice;
}

// change quantity with + - buttons
// + button: update current quantity, subTotal and totalPrice on the page and local storage
document.querySelectorAll(".cart-product-quantity-button.plus").forEach(function (item) {
    item.addEventListener("click", function() {
        let productList = localStorage.getItem("cartProducts"); // local storage
        productList = JSON.parse(productList);
        let productID = item.parentNode.parentNode.parentNode.id;
        productList[productID].product_quantity+=1;
        let subTotal = localStorage.getItem("subTotal"); // update subTotal in localStorage
        subTotal = parseFloat(subTotal);
        subTotal += productList[productID].final_price;
        subTotal = parseFloat(subTotal.toFixed(2));
        localStorage.setItem("subTotal",JSON.stringify(subTotal));
        let totalPrice = localStorage.getItem("totalPrice"); // update totalPrice in localStorage
        totalPrice = parseFloat(totalPrice);
        totalPrice += productList[productID].final_price;
        totalPrice = parseFloat(totalPrice.toFixed(2));
        localStorage.setItem("totalPrice",JSON.stringify(totalPrice));
        localStorage.setItem("cartProducts",JSON.stringify(productList));

        let inputValue = document.getElementById(`${ productID } product-quantity`).value; // page
        let productQuantity = parseInt(inputValue)
        productQuantity += 1;
        document.getElementById(`${ productID } product-quantity`).value = productQuantity;
        let displaySubTotal = document.querySelector(".cart-product-total .cart-product-total-fee");
        let displayTotalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
        displaySubTotal.innerHTML = "$"+subTotal;
        displayTotalPrice.innerHTML = "$"+totalPrice;
});
});

//- button:  update current quantity on the page and local storage
document.querySelectorAll(".cart-product-quantity-button.minus").forEach(function (item) {
    item.addEventListener("click", function() {
        let productList = localStorage.getItem("cartProducts"); //local storage
        productList = JSON.parse(productList);
        let productID = this.parentNode.parentNode.parentNode.id;
        productList[productID].product_quantity -= 1;
        let subTotal = localStorage.getItem("subTotal");
        subTotal = parseFloat(subTotal);
        let totalPrice = localStorage.getItem("totalPrice");
        totalPrice = parseFloat(totalPrice);

        if (productList[productID].product_quantity > 0) {  // condition to prevent negative value,
            subTotal -= productList[productID].final_price; //   0 because quantity -= 1 above
            subTotal = parseFloat(subTotal.toFixed(2));
            localStorage.setItem("subTotal",JSON.stringify(subTotal));// update subTotal in localStorage
            totalPrice -= productList[productID].final_price;
            totalPrice = parseFloat(totalPrice.toFixed(2));
            localStorage.setItem("totalPrice",JSON.stringify(totalPrice)); // update totalPrice in localStorage
        }

        if ( productList[productID].product_quantity < 1){
            productList[productID].product_quantity = 1
        }
        localStorage.setItem("cartProducts", JSON.stringify(productList)); // update products in localStorage

        let inputValue = document.getElementById(`${productID} product-quantity`).value; // page
        let productQuantity = parseInt(inputValue)
        productQuantity -= 1;
        if (productQuantity < 1){
            productQuantity = 1
        }

        document.getElementById(`${productID} product-quantity`).value = productQuantity;
        let displaySubTotal = document.querySelector(".cart-product-total .cart-product-total-fee");
        let displayTotalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
        displaySubTotal.innerHTML = "$"+subTotal;
        displayTotalPrice.innerHTML = "$"+totalPrice;
    });
});

// remove product
document.querySelectorAll(".cart-product-remove-button").forEach(function (item){
    item.addEventListener("click", function (){
        let productList = localStorage.getItem("cartProducts");
        productList = JSON.parse(productList);
        let productID = this.parentNode.parentNode.id;
        delete productList[productID];
        localStorage.setItem("cartProducts", JSON.stringify(productList));
        location.reload();
    })
})