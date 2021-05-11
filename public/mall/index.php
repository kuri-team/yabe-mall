<?php require_once('../../private/initialize.php'); ?>

<?php
    
    $page_title = "Yabe | Home";
    $style_sheets = [
        "/css/common.css",
        "/css/mall-home.css",
        "/css/cards.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/cards.js"
    ];
    
    include(SHARED_PATH . "/top.php");
    
?>

  <div class="header-hero">
    <img alt="Surprised person pointing at the Yabe logo" src="../media/image/hero.jpg">
  </div>

  <main id="mall-main">
    <section class="card-gallery mall-home-section mall-home-section-gallery">
      <h1 class="card-gallery-title">NEW PRODUCTS<span class="mall-home-section-heading-link"><a href="browse/by-product/by-date.html">MORE</a></span></h1>

      <button class="card-gallery-left-bttn"><i class="fas fa-angle-left"></i></button>
      <div class="card-gallery-content flex-container flex-justify-content-space-between flex-align-items-center overflow-hidden">
        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/best_buy_shop/camera/4_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/sephora_shop/body/1_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/sephora_shop/sunscreen/13_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/zappos_shop/boots/1_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/zappos_shop/sandals/9_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/best_buy_shop/others/9_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>
      </div>
      <button class="card-gallery-right-bttn"><i class="fas fa-angle-right"></i></button>
    </section>

    <section class="mall-home-section" id="featured-products">
      <h1>FEATURED PRODUCTS<span class="mall-home-section-heading-link"><a href="browse/by-product/featured.html">ALL</a></span></h1>

      <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/hsy_shop/HSY_main_cover_square.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Purple Hyacinth Comic</a>
            <a class="product-card-shop" href="../store/store-template/">HSY Shop</a>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">18/6/2018</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail-2/"><img alt="image of a product" src="../media/image/product-detail-2/yoohankim-trio_square.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail-2/">Omniscient Reader's Viewpoint Novel</a>
            <a class="product-card-shop" href="../store/store-template/">HSY Shop</a>
            <p class="product-card-price">$13.50</p>
            <div class="product-card-sale-card">6/1/2018</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/best_buy_shop/phone/2_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/best_buy_shop/camera/4_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/zappos_shop/slippers/15_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/zappos_shop/slippers/16_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/sephora_shop/accessories/18_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/best_buy_shop/watches/12_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/best_buy_shop/phone/8_best_buy.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/sephora_shop/skincare/11_sephora.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/zappos_shop/heels/8_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>

        <div class="product-card">
          <a href="../store/store-template/product-detail/"><img alt="image of a product" src="../media/image/zappos_shop/boots/2_zappos.jpg"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="../store/store-template/product-detail/">Product Title Goes Here</a>
            <a class="product-card-shop" href="../store/store-template/">Shop Name Goes Here</a>
            <p class="product-card-price-crossed-out">$22.99</p>
            <p class="product-card-price">$16.95</p>
            <div class="product-card-sale-card">1/4/2020</div>
          </div>
        </div>
      </div>

      <button class="cards-load-more-bttn" id="load-more-featured-products" onclick="">LOAD MORE</button>
    </section>

    <section class="mall-home-section" id="featured-stores">
      <h1>FEATURED STORES<span class="mall-home-section-heading-link"><a href="browse/by-store/featured.html">ALL</a></span></h1>

      <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/best_buy_shop/Best_Buy_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Best Buy</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/sephora_shop/sephora_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Sephora</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/zappos_shop/zappos_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Zappos</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/Xiaomi_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Xiaomi</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/webtoon_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Webtoon</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/viettel_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Viettel</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/samsung_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">SamSung</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/jabra_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Jabra</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/paula_choice_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Paula Choice</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/nike_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Nike</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/lenovo_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Lenovo</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/larocheposay_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Laroche Posay</a>
        </div>
      </div>

      <button class="cards-load-more-bttn" id="load-more-featured-stores" onclick="">LOAD MORE</button>
    </section>

    <section class="mall-home-section card-gallery">
      <h1 class="card-gallery-title">NEW STORES<span class="mall-home-section-heading-link"><a href="browse/by-store/by-date.html">MORE</a></span></h1>

      <button class="card-gallery-left-bttn"><i class="fas fa-angle-left"></i></button>
      <div class="card-gallery-content flex-container flex-justify-content-space-between flex-align-items-center overflow-hidden clear-both">
        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/apple_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Apple</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/birkenstock_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Birkenstock</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/canon_logo.jpg"></a>
          <a class="store-card-name" href="../store/store-template">Canon</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/dermalogica_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Dermalogica</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/floralpunk_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">Floralpunk</a>
        </div>

        <div class="store-card">
          <a href="../store/store-template"><img class="store-card-thumbnail" alt="image representation of a shop" src="../media/image/store_logos/hp_logo.png"></a>
          <a class="store-card-name" href="../store/store-template">HP</a>
        </div>
      </div>
      <button class="card-gallery-right-bttn"><i class="fas fa-angle-right"></i></button>
    </section>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>