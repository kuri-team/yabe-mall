<?php require_once("../../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe | Cart";
    $style_sheets = [
        "/css/common.css",
        "/css/cart.css",
    ];
    $scripts = array(
        "/js/common.js",
        "/js/cart/cart-display.js"
    );
    
    
    $place_order_href = null;
    $place_order_onclick = null;
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        $place_order_href = "/mall/cart/thank-you.php";
        $place_order_onclick = "onclick='clearCart();'";
    } else {
        $place_order_href = "/mall/account/register?q=place_order";
        $place_order_onclick = "";
    }
    
    
    include(SHARED_PATH . "/top.php");

?>

  <main>
    <ul class=breadcrumb>
      <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
      <li><a href="<?=url_for("/mall/cart");?>">Cart</a></li>
    </ul>

    <h1 class="content-title">CART</h1>
    <div class="content-body">

        <div class="empty-cart">
          <div class="empty-message">
            <i class="fas fa-shopping-cart"></i>
            <p class="empty-note">The cart is currently empty</p>
          </div>
          <div class="href-button">
            <a href="<?=url_for("/mall");?>"><button class="href-button-home">HOME</button></a>
          </div>
        </div>

        <div class="cart-body">
          <div class="cart-product-list">
          <ul  class="cart-product-table">
          </ul>
          </div>

          <div class="cart-product-summary">
          <ul class="cart-product-summary-table">
                <li class="cart-product-summary-table-caption">SUMMARY</li>
                <li class="cart-product-total">
                  <span class="cart-product-total-tag">Price</span>
                  <span class="cart-product-total-fee"></span>
                </li>
                <li class="cart-product-delivery">
                  <span class="cart-product-total-tag">Delivery</span>
                  <span class="cart-product-total-fee">$15.00</span>
                </li>
                <li class="cart-product-coupon">
                  <span class="cart-product-total-tag">
                    <label for="insert-coupon">Coupon</label>
                    <input class="insert-coupon" id="insert-coupon" type="text">
                    <button class="apply-coupon-button">APPLY</button>
                    <button class="remove-coupon-button"><i class="fas fa-times"></i></button>
                   </span>
                  <span class="cart-product-total-fee"></span> <br><br><br>
                  <p class="coupon-msg"></p>
                </li>
                <li class="cart-product-fees-total">
                  <span class="cart-product-total-tag">Total</span>
                  <span class="cart-product-total-fee"></span>
                </li>
                <li class="cart-product-summary-button">
                  <span ><a href="<?=url_for("/mall/");?>"><button class="cart-product-summary-button-continue">CONTINUE SHOPPING</button></a></span>
                  <span ><a href="<?=url_for($place_order_href);?>"><button class="cart-product-summary-button-order" <?=$place_order_onclick;?>>PLACE ORDER</button></a></span>
                </li>
          </ul>
          </div>
     </div>
     </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>