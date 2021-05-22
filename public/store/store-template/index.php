<?php
    require_once("../../../private/initialize.php");
    require_once("../../../private/functions.php");
?>

<?php

    $page_title = "HSY Shop | Home";
    $style_sheets = [
        "/css/common.css",
        "/css/cards.css",
        "/css/store/store.css",
        "/css/store/store-home.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js"
    ];

    include(SHARED_PATH . "/top.php");
    
    
    /**
     * Display product card of each product
     */
    function display_product_cards($product) {
        echo "<div class='product-card'>";
        echo "<a href='" . url_for("/store/store-template/product-detail") . "'><img alt='image of a product'
                  src='../../media/image/placeholder_262x250.png'></a>";
        echo "<div class='product-card-details'>";
        echo "<a class='product-card-title' href='" . url_for("/store/store-template/product-detail") . "'>Purple Hyacinth Comic</a>";
        echo "<p class='product-card-shop'>Sophism &amp; Ephemerys</p>";
        echo "<p class='product-card-price'>$16.95</p>";
        echo "<div class='product-card-sale-card'>18/6/2018</div>";
        echo "</div>" . "\n" . "</div>";
    }

?>

  <main>
      <?php require_once(SHARED_PATH . "/store/store-header.php"); ?>
      
      <section class="store-home-content">
        <section class="store-home-content-new mb-80">
          <div class="store-home-content-header text-align-center">
            <h1 class="mr-10">NEW PRODUCTS</h1>
            <a href="<?=url_for("/store/store-template/browse-product/by-date.php");?>">VIEW MORE</a>
          </div>

          <section class="store-product-cards">
            <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
                <?php display_product_cards(); ?>
            </div>
          </section>
        </section>

        <section class="store-home-content-featured mb-80">
          <div class="store-home-content-header text-align-center">
            <h1 class="mr-10">FEATURED PRODUCTS</h1>
            <a href="">SEE ALL</a>
          </div>

          <section class="store-product-cards">
            <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
              
            </div>
          </section>
        </section>
      </section>
    
      <?php require_once(SHARED_PATH . "/store/store-footer.php"); ?>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>