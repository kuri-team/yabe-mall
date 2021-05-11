<?php require_once("../../../../private/initialize.php"); ?>

<?php

$page_title = 'Yabe | Products';
$style_sheets = [
    "/css/common.css",
    "/css/browse.css",
    "/css/cards.css",
    "/css/pagination.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>

<main id="content">
    <ul class=breadcrumb>
      <li><a href="../../">Home</a>/</li>
      <li><a href="../">Browse Products</a>/</li>
      <li><a href="#">By Category</a></li>
    </ul>

  <div class="content-body">

    <div>
      <label><select class="select-list">
        <option value="all-categories">ALL CATEGORIES</option>
        <option value="accessories">Accessories</option>
        <option value="computers">Computers</option>
        <option value="electronics">Electronics</option>
        <option value="makeup">Makeup</option>
        <option value="skincare">Skincare</option>
        <option value="shoes">Shoes</option>
        <option value="clothing">Clothing</option>
        <option value="toys">Toys</option>
        <option value="stationery">Stationery</option>
        <option value="cookware">Cookware</option>
      </select></label>
    </div>


    <div class="product-list">
      <div class="flex-container flex-justify-content-space-evenly flex-wrap">

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/best_buy_shop/others/15_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/sephora_shop/makeup/5_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/best_buy_shop/phone/8_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/zappos_shop/heels/6_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/zappos_shop/sneakers/19_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/sephora_shop/sunscreen/14_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/best_buy_shop/laptop/20_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/zappos_shop/heels/7_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/zappos_shop/sandals/10_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/best_buy_shop/camera/10_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/best_buy_shop/laptop/5_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../../../store/store-template/product-detail/"><img alt="image of a product" src="../../../media/image/sephora_shop/body/6_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../../../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../../../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">30% Off</div>
          </div>
        </div>

      </div>
    </div>

    <div class="pagination">
      <a href="#" class="current-page">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">&gt;</a>
      <a href="#">&raquo;</a>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>