<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/csv.php");
    require_once("../../private/dynamic-display.php");

?>

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
    
    // Constants for display at most 10 items
    define("NEW_PRODUCTS_DISPLAY_NUM", 10);
    define("FEATURED_PRODUCTS_DISPLAY_NUM", 10);
    define("NEW_STORES_DISPLAY_NUM", 10);
    define("FEATURED_STORES_DISPLAY_NUM", 10);
    

    // Dynamic loading of database
    $products = read_csv("../../private/database/products.csv", true);
    $stores = read_csv("../../private/database/stores.csv", true);
    
    // Sort products and stores from latest to oldest created time
    usort($products, "compare_by_time");
    usort($stores, "compare_by_time");
    
    include(SHARED_PATH . "/top.php");

?>

    <div class="header-hero">
        <img alt="Surprised person pointing at the Yabe logo" src="../media/image/hero.jpg">
    </div>

    <main id="mall-main">
        <section class="card-gallery mall-home-section mall-home-section-gallery">
            <h1 class="card-gallery-title">NEW PRODUCTS<span class="mall-home-section-heading-link"><a href="<?=url_for("/mall/browse/by-product/by-date.php");?>">MORE</a></span></h1>

            <button class="card-gallery-left-bttn"><i class="fas fa-angle-left"></i></button>
            <div class="card-gallery-content flex-container flex-justify-content-space-between flex-align-items-center overflow-hidden">
                <?php
                    
                    // Loop counting the number of products until reaching 10 items
                    // echo to return the year-month-day part of created-time string.
                    // Get a query containing the product's ID and store's ID for dynamic product detail can work properly
                    $display_count = 0;
                    while ($display_count < NEW_PRODUCTS_DISPLAY_NUM) {
                        echo "<div class='product-card'>
                        <a href='" . url_for("/store/content/product-detail?id={$products[$display_count]['id']}") . "'><img alt='image of a product' src='../media/image/placeholder_262x250.png'></a>
                        <div class='product-card-details'>
                          <a class='product-card-title' href='" . url_for("/store/content/product-detail?id={$products[$display_count]['id']}") . "'>" . $products[$display_count]["name"] . "</a>
                          <a class='product-card-shop' href='" . url_for("/store/content?id={$products[$display_count]['store_id']}") . "'>" . get_store_name((int) $products[$display_count]["store_id"], $stores) . "</a>
                          <p class='product-card-price'>$" . $products[$display_count]["price"] . "</p>
                          <div class='product-card-sale-card'>" . substr($products[$display_count]["created_time"],0,10) . "</div>
                        </div>
                      </div>";
                        $display_count++;
                    }
                
                ?>
            </div>
            <button class="card-gallery-right-bttn"><i class="fas fa-angle-right"></i></button>
        </section>

        <section class="mall-home-section" id="featured-products">
            <h1>FEATURED PRODUCTS<span class="mall-home-section-heading-link"><a href="<?=url_for("/404");?>">ALL</a></span></h1>

            <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
                <?php
                    
                    // Loop counting the number of products until reaching 10 items
                    // Get a query containing the product's ID for dynamic product detail can work properly
                    $display_count = 0;
                    $featured_mall_products = check_featured_mall_products($products);
                    while ($display_count < FEATURED_PRODUCTS_DISPLAY_NUM) {
                        echo "<div class='product-card'>
                        <a href='" . url_for("/store/content/product-detail?id={$featured_mall_products[$display_count]['id']}") . "'><img alt='image of a product' src='../media/image/placeholder_262x250.png'></a>
                        <div class='product-card-details'>
                          <a class='product-card-title' href='" . url_for("/store/content/product-detail?id={$featured_mall_products[$display_count]['id']}") . "'>" . $featured_mall_products[$display_count]["name"] . "</a>
                          <a class='product-card-shop' href='" . url_for("/store/content?id={$featured_mall_products[$display_count]['store_id']}") . "'>" . get_store_name((int) $featured_mall_products[$display_count]["store_id"], $stores) . "</a>
                          <p class='product-card-price'>$" . $featured_mall_products[$display_count]["price"] . "</p>
                          <div class='product-card-sale-card'>" . substr($featured_mall_products[$display_count]["created_time"],0,10) . "</div>
                        </div>
                      </div>";
                        $display_count++;
                    }
                
                ?>
            </div>

            <button class="cards-load-more-bttn" id="load-more-featured-products" onclick="">LOAD MORE</button>
        </section>

        <section class="mall-home-section" id="featured-stores">
            <h1>FEATURED STORES<span class="mall-home-section-heading-link"><a href="<?=url_for("/404");?>">ALL</a></span></h1>

            <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
                <?php
                    
                    // Loop counting the number of stores until reaching 10 items
                    // Get a query containing the store's ID for dynamic store home can work properly
                    $display_count = 0;
                    $featured_mall_stores = check_featured_mall_stores($stores);
                    while ($display_count < FEATURED_STORES_DISPLAY_NUM) {
                        echo "<div class='store-card'>
                        <a href='" . url_for("/store/content?id={$featured_mall_stores[$display_count]['id']}") . "'><img class='store-card-thumbnail' alt='image representation of a shop' src='../media/image/profile-placeholder_143x143.png'></a>
                        <a class='store-card-name' href='" . url_for("/store/content?id={$featured_mall_stores[$display_count]['id']}") . "'>" . $featured_mall_stores[$display_count]["name"] . "</a>
                      </div>";
                        $display_count++;
                    }
                
                ?>

            </div>

            <button class="cards-load-more-bttn" id="load-more-featured-stores" onclick="">LOAD MORE</button>
        </section>

        <section class="mall-home-section card-gallery">
            <h1 class="card-gallery-title">NEW STORES<span class="mall-home-section-heading-link"><a href="<?=url_for("/404");?>">MORE</a></span></h1>

            <button class="card-gallery-left-bttn"><i class="fas fa-angle-left"></i></button>
            <div class="card-gallery-content flex-container flex-justify-content-space-between flex-align-items-center overflow-hidden clear-both">
                <?php
                    
                    // Loop counting the number of stores until reaching 10 items
                    // echo to return the year-month-day part of created-time string.
                    // Get a query containing the store's ID for dynamic store home can work properly
                    $display_count = 0;
                    while ($display_count < NEW_STORES_DISPLAY_NUM) {
                        echo "<div class='store-card'>
                        <a href='" . url_for("/store/content?id={$stores[$display_count]['id']}") . "'><img class='store-card-thumbnail' alt='image representation of a shop' src='../media/image/profile-placeholder_143x143.png'></a>
                        <a class='store-card-name' href='" . url_for("/store/content?id={$stores[$display_count]['id']}") . "'>" . $stores[$display_count]["name"] . "</a>
                        <div class='store-card-sale-card'>" . substr($stores[$display_count]["created_time"],0,10) . "</div>
                      </div>";
                        $display_count++;
                    }
                
                ?>

            </div>
            <button class="card-gallery-right-bttn"><i class="fas fa-angle-right"></i></button>
        </section>
    </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>