const VIEW_CART_ITEMS = document.querySelector(".cart-body");
const EMPTY_MESSAGE = document.querySelector(".empty-cart");
let discountAmount = 0;
localStorage.setItem("discountAmount",discountAmount);
let finalPrice = 0;
localStorage.setItem("finalPrice",finalPrice);

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
function listItemInCart() {
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
                  <a class="cart-product-shop" href=${item.store_Link}>${item.store_name}</a>
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

    Object.values(productList).map(function(item) {
        document.getElementById(`${item.product_ID} product-quantity`).disabled = true;
    })

    let totalPrice = subTotal + deliveryCharge;
    localStorage.setItem("totalPrice",totalPrice);
    let displaySubTotal = document.querySelector(".cart-product-total .cart-product-total-fee");
    let displayTotalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
    subTotal = localStorage.getItem("subTotal");
    finalPrice = localStorage.getItem("totalPrice");
    subTotal = parseFloat(subTotal).toFixed(2);
    finalPrice = parseFloat(finalPrice).toFixed(2);
    displaySubTotal.innerHTML = "$"+subTotal;
    displayTotalPrice.innerHTML = "$"+finalPrice;
}

let subTotal = localStorage.getItem("subTotal");
subTotal = parseFloat(subTotal);
let totalPrice = localStorage.getItem("totalPrice");
totalPrice = parseFloat(totalPrice);
let discountValue = totalPrice * discountAmount;
localStorage.setItem("discountValue", discountValue);

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
        subTotal += parseFloat(productList[productID].final_price);
        subTotal = parseFloat(subTotal.toFixed(2));
        localStorage.setItem("subTotal",JSON.stringify(subTotal));
        let totalPrice = localStorage.getItem("totalPrice"); // update totalPrice in localStorage
        totalPrice = parseFloat(totalPrice);
        totalPrice += parseFloat(productList[productID].final_price);
        discountValue = totalPrice * discountAmount;
        finalPrice = totalPrice - discountValue;
        discountValue = parseFloat(discountValue.toFixed(2));
        finalPrice = parseFloat(finalPrice.toFixed(2));
        localStorage.setItem("totalPrice",JSON.stringify(totalPrice));
        localStorage.setItem("cartProducts",JSON.stringify(productList));
        localStorage.setItem("discountValue",JSON.stringify(discountValue));
        localStorage.setItem("finalPrice",JSON.stringify(finalPrice));


        let inputValue = document.getElementById(`${ productID } product-quantity`).value; // page
        let productQuantity = parseInt(inputValue)
        productQuantity += 1;
        document.getElementById(`${ productID } product-quantity`).value = productQuantity;
        subTotal = subTotal.toFixed(2);
        finalPrice = finalPrice.toFixed(2);
        let displaySubTotal = document.querySelector(".cart-product-total .cart-product-total-fee");
        let displayFinalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
        displaySubTotal.innerHTML = "$" + subTotal;
        displayFinalPrice.innerHTML = "$" + finalPrice;

        if (document.getElementById("insert-coupon").disabled === true) {
            let displayDiscountValue = document.querySelector(".cart-product-coupon .cart-product-total-fee");
            discountValue = discountValue.toFixed(2);
            displayDiscountValue.innerHTML = "- $" + discountValue;
            discountValue = parseFloat(discountValue);
        }

        location.reload();
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
            subTotal -= parseFloat(productList[productID].final_price); //   0 because quantity -= 1 above
            localStorage.setItem("subTotal",JSON.stringify(subTotal));// update subTotal in localStorage
            totalPrice -= parseFloat(productList[productID].final_price);
            discountValue = totalPrice * discountAmount;
            finalPrice = totalPrice - discountValue;
            totalPrice = parseFloat(totalPrice.toFixed(2));
            discountValue = parseFloat(discountValue.toFixed(2));
            finalPrice = parseFloat(finalPrice.toFixed(2));
            localStorage.setItem("totalPrice",JSON.stringify(totalPrice));
            localStorage.setItem("cartProducts",JSON.stringify(productList));
            localStorage.setItem("discountValue",JSON.stringify(discountValue));
            localStorage.setItem("finalPrice",JSON.stringify(finalPrice));

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

        document.getElementById(`${productID} product-quantity`).value = productQuantity
        subTotal = subTotal.toFixed(2);
        finalPrice = finalPrice.toFixed(2);
        let displaySubTotal = document.querySelector(".cart-product-total .cart-product-total-fee");
        let displayFinalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
        displaySubTotal.innerHTML = "$"+subTotal;
        displayFinalPrice.innerHTML = "$"+finalPrice;

        if (document.getElementById("insert-coupon").disabled === true) {
            let displayDiscountValue = document.querySelector(".cart-product-coupon .cart-product-total-fee")
            discountValue = discountValue.toFixed(2)
            displayDiscountValue.innerHTML = "- $" + discountValue;
            discountValue = parseFloat(discountValue);
        }

        location.reload();
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

// apply coupon
const APPLY_COUPON = document.querySelector(".apply-coupon-button");
let displayFinalPrice = document.querySelector(".cart-product-fees-total .cart-product-total-fee");
let removeAfterApply = document.querySelector(".apply-coupon-button");
let applyAfterRemove = document.querySelector(".remove-coupon-button");
let couponMsg = document.querySelector(".coupon-msg");

APPLY_COUPON.addEventListener("click", function() {
    let checkCoupon = document.getElementById("insert-coupon").value;
    if (checkCoupon === "COSC2430-HD") {
        discountAmount = 0.2;
        applyDiscount();
        removeCoupon();
    } else if (checkCoupon === "COSC2430-DI") {
        discountAmount = 0.1;
        applyDiscount();
        removeCoupon();
    } else {
        couponMsg.classList.add("invalid");
        couponMsg.innerHTML = "Invalid coupon code";
    }
})

// apply discount and add discount value on page
function applyDiscount () {
    discountValue = totalPrice * discountAmount;
    localStorage.setItem("discountAmount",JSON.stringify(discountAmount));
    finalPrice = totalPrice - discountValue;
    discountValue = parseFloat(discountValue.toFixed(2));
    finalPrice = parseFloat(finalPrice.toFixed(2));
    localStorage.setItem("discountValue",discountValue);
    localStorage.setItem("finalPrice", JSON.stringify(finalPrice));
    finalPrice = finalPrice.toFixed(2);
    discountValue = discountValue.toFixed(2);
    displayFinalPrice.innerHTML = "$" + finalPrice;
    document.querySelector(".cart-product-coupon .cart-product-total-fee").innerHTML = "- $"+discountValue;
    removeAfterApply.classList.add("hide");
    applyAfterRemove.classList.add("active");
    couponMsg.classList.remove("invalid");
    couponMsg.innerHTML = "Coupon applied";
    document.getElementById("insert-coupon").disabled = true;
    discountValue = parseFloat(discountValue);
}

// reload after remove coupon
function removeCoupon () {
    applyAfterRemove.addEventListener("click", function() {
        location.reload();
    })
}

// Clearing the cart
function clearCart () {
    localStorage.removeItem("cartProducts");
}
