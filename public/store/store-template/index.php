<?php
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/functions.php");
    require_once("../../../private/csv.php");
    require_once("../../../private/dynamic-display.php");
    
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
     * Dynamic display of product cards
     * @param $product
     * to be displayed
     */
    function display_product_cards($product) {
        echo "<div class='product-card'>";
        echo "<a href='" . url_for("/store/store-template/product-detail?id=" . $product["id"]) . "'>
                <img alt='image of a product' src='../../media/image/placeholder_262x250.png'></a>";
        echo "<div class='product-card-details'>";
        echo "<a class='product-card-title' href='" . url_for("/store/store-template/product-detail") . "'>" . $product["name"] . "</a>";
        echo "<p class='product-card-shop'>Short description</p>";
        echo "<p class='product-card-price'>" . $product["price"] . "</p>";
        echo "<div class='product-card-sale-card'>" . $product["created_time"] . "</div>";
        echo "</div>" . "\n" . "</div>";
    }

    // get all stores and products data
    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    $products = read_csv(PRIVATE_PATH . "\database/products.csv", true);
    
    $specific_store = get_store_data($stores);
    $all_featured_products = check_featured_store_products($products);
    
    // get all products of a specific store and sort them by time created from newest to oldest
    $specific_products = get_specific_store_products($products, $specific_store);
    $sorted_products = usort($specific_products, "compare_by_time");
    
    // get products that are featured on a specific store
    $specific_featured_products = get_specific_store_products($all_featured_products, $specific_store);
    
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
                <?php ?>
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