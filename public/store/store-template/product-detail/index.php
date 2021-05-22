<?php
    require_once(PRIVATE_PATH . "\initialize.php");
    require_once(PRIVATE_PATH . "\csv.php");
    require_once(PRIVATE_PATH . "\dynamic-display.php");

?>

<?php
    
    // get all stores, products, and categories data
    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    $products = read_csv(PRIVATE_PATH . "\database/products.csv", true);
    $categories = read_csv(PRIVATE_PATH . "\database/categories.csv", true);
    
    // get data of the current product and its store
    $specific_product = get_item_data($products);
    $specific_store = get_item_info($specific_product["store_id"], $stores);
    $store_cat = get_item_info($specific_store["category_id"], $categories);
    
    
    $page_title = $specific_product["name"];
    $style_sheets = [
        "/css/common.css",
        "/css/cards.css",
        "/css/store/product-detail.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/cards.js",
        "/js/cart/cart.js",
    ];

    include(SHARED_PATH . "/top.php");

?>

  <main id="product-content">
    <ul class="breadcrumb">
      <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
      <li><a href="<?=url_for("/mall/browse/?by-store=by-category");?>"><?=$store_cat["name"]; ?></a>/</li>
      <li><a href="<?=url_for("/store/store-template?id=" . $specific_product["store_id"]);?>" id="store-name"><?=$specific_store["name"]; ?></a>/</li>
      <li><a href="<?=url_for("/store/store-template/product-detail?id=" . $specific_product["id"]);?>"><?=$specific_product["name"]; ?></a></li>
    </ul>

    <section id="product-info" class="content-body flex-container">
      <span class="product-info-other-media flex-container flex-direction-column">
        <img src="../../../media/image/placeholder_262x250.png" alt="another image of the
            product" class="mb-10">
        <img src="../../../media/image/placeholder_262x250.png" alt="another image of the
            product" class="mb-10">
        <img src="../../../media/image/placeholder_262x250.png"  alt="another image of the
            product" class="mb-10">
        <img src="../../../media/image/placeholder_262x250.png"  alt="another image of the
            product">
      </span>

      <span class="product-info-main-img">
        <img src="../../../media/image/placeholder_1920x1080.jpg" alt="main image of the product">
      </span>

      <div class="product-info-main">
        <p><?= strtoupper($specific_store["name"]); ?></p>
        <h2><?=$specific_product["name"]; ?></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="product-info-details">
          <p class="product-info-price float-left">&dollar;<?=$specific_product["price"]; ?></p>
          <p class="product-info-date float-left"><?= substr($specific_product["created_time"], 0, 10); ?></p>
        </div>
        <div class="shop-bttn clear-both">
          <button class="add-to-cart">ADD TO CART</button>
          <button class="buy-now"><a href="<?=url_for("/mall/cart");?>">BUY NOW</a></button>
        </div>
      </div>
    </section>

    <section id="product-description" class="content-body">
      <h3>Product Description</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur dolores magni,
        aliquam perferendis debitis ipsa necessitatibus nisi quisquam velit ex dolorem, facilis
        et rerum quod blanditiis ducimus voluptatem adipisci.</p>

      <h3 class="more-info">More information</h3>
      <table class="product-info-table">
        <tr>
          <th>Publisher</th>
          <td>Soph &amp; Eph Company</td>
        </tr>
        <tr>
          <th>ID number</th>
          <td><?=$specific_product["id"]; ?></td>
        </tr>
        <tr>
          <th>Language</th>
          <td>English</td>
        </tr>
        <tr>
          <th>No. pages</th>
          <td>345</td>
        </tr>
        <tr>
          <th>Dimension</th>
          <td>20 x 15 x 17 cm</td>
        </tr>
        <tr>
          <th>Special gift</th>
          <td>Purple Hyacinth bookmark</td>
        </tr>
      </table>
    </section>

    <section id="recommended-product" class="card-gallery">
      <h2 class="card-gallery-title text-align-center">RECOMMENDED PRODUCTS</h2>

      <button class="card-gallery-left-bttn"><i class="fas fa-angle-left"></i></button>
      <div class="card-gallery-content flex-container flex-justify-content-space-between flex-align-items-center overflow-hidden clear-both">
        <div class="product-card">
          <a href="<?=url_for("/store/store-template/product-detail");?>"><img alt="image of a product"
             src="../../../media/image/placeholder_262x250.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="<?=url_for("/store/store-template/product-detail");?>">Product Title Goes Here</a>
            <a class="product-card-shop" href="<?=url_for("/store/store-template");?>">Shop Name Goes Here</a>
            <p class="product-card-price">$12.99</p>
            <div class="product-card-sale-card">13/10/2015</div>
          </div>
        </div>

        <div class="product-card">
          <a href="<?=url_for("/store/store-template/product-detail");?>"><img alt="image of a product"
            src="../../../media/image/placeholder_262x250.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="<?=url_for("/store/store-template/product-detail");?>">Product Title Goes Here</a>
            <a class="product-card-shop" href="<?=url_for("/store/store-template");?>">Shop Name Goes Here</a>
            <p class="product-card-price">$6.50</p>
            <div class="product-card-sale-card">20/12/2012</div>
          </div>
        </div>

        <div class="product-card">
          <a href="<?=url_for("/store/store-template/product-detail");?>"><img alt="image of a product"
            src="../../../media/image/placeholder_262x250.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="<?=url_for("/store/store-template/product-detail");?>">Product Title Goes Here</a>
            <a class="product-card-shop" href="<?=url_for("/store/store-template");?>">Shop Name Goes Here</a>
            <p class="product-card-price">$7.30</p>
            <div class="product-card-sale-card">21/5/2019</div>
          </div>
        </div>

        <div class="product-card">
          <a href="<?=url_for("/store/store-template/product-detail");?>"><img alt="image of a product"
            src="../../../media/image/placeholder_262x250.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="<?=url_for("/store/store-template/product-detail");?>">Product Title Goes Here</a>
            <a class="product-card-shop" href="<?=url_for("/store/store-template");?>">Shop Name Goes Here</a>
            <p class="product-card-price">$12.99</p>
            <div class="product-card-sale-card">14/2/2013</div>
          </div>
        </div>

        <div class="product-card">
          <a href="<?=url_for("/store/store-template/product-detail");?>"><img alt="image of a product"
            src="../../../media/image/placeholder_262x250.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="<?=url_for("/store/store-template/product-detail");?>">Product Title Goes Here</a>
            <a class="product-card-shop" href="<?=url_for("/store/store-template");?>">Shop Name Goes Here</a>
            <p class="product-card-price">$12.99</p>
            <div class="product-card-sale-card">14/2/2013</div>
          </div>
        </div>

        <div class="product-card">
          <a href="<?=url_for("/store/store-template/product-detail");?>"><img alt="image of a product"
            src="../../../media/image/placeholder_262x250.png"></a>
          <div class="product-card-details">
            <a class="product-card-title" href="<?=url_for("/store/store-template/product-detail");?>">Product Title Goes Here</a>
            <a class="product-card-shop" href="<?=url_for("/store/store-template");?>">Shop Name Goes Here</a>
            <p class="product-card-price">$12.99</p>
            <div class="product-card-sale-card">14/2/2013</div>
          </div>
        </div>
      </div>
      <button class="card-gallery-right-bttn"><i class="fas fa-angle-right"></i></button>
    </section>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>