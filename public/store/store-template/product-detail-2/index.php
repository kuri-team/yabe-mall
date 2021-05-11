<?php require_once("../../../../private/initialize.php"); ?>

<?php

    $page_title = "Omniscient Reader\'s Viewpoint Novel";
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
    <li><a href="../../../mall/">Home</a>/</li>
    <li><a href="../../../mall/browse/by-store/by-category.php">Bookstore</a>/</li>
    <li><a href="../" id="store-name">HSY Shop</a>/</li>
    <li><a href="#">Omniscient Reader's Viewpoint Novel</a></li>
  </ul>

  <section id="product-info" class="content-body flex-container">
            <span class="product-info-other-media flex-container flex-direction-column">
                <img src="../../../media/image/product-detail-2/kim-dok-ja.png" alt="another image of the
                    product" class="mb-10">
                <img src="../../../media/image/product-detail-2/yoo-jung-hyeok.jpg" alt="another image of the
                    product" class="mb-10">
                <img src="../../../media/image/product-detail-2/han-soo-young.jpg"  alt="another image of the
                    product" class="mb-10">
                <img src="../../../media/image/product-detail-2/dok-hyuk.jpg" alt="another image of the
                    product">
            </span>

    <span class="product-info-main-img">
                <img src="../../../media/image/product-detail-2/yoohankim-trio.png"
                     alt="main image of the product">
            </span>
    <div class="product-info-main">
      <p>SING SHONG</p>
      <h2>Omniscient Reader's Viewpoint Novel</h2>
      <p class="add-to-fave"><i class="far fa-heart"></i> Add to Favorites</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
      <div class="product-info-details">
        <p class="product-info-price float-left">&dollar;13.50</p>
        <p class="product-info-date float-left">6/1/2018</p>
      </div>
      <div class="shop-bttn clear-both">
        <button class="add-to-cart">ADD TO CART</button>
        <button class="buy-now"><a href="../../../mall/cart">BUY NOW</a></button>
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
        <td>Munpia</td>
      </tr>
      <tr>
        <th>ID number</th>
        <td>030815020104</td>
      </tr>
      <tr>
        <th>Language</th>
        <td>English</td>
      </tr>
      <tr>
        <th>No. pages</th>
        <td>551</td>
      </tr>
      <tr>
        <th>Dimension</th>
        <td>19 x 25 x 20 cm</td>
      </tr>
      <tr>
        <th>Special gift</th>
        <td>Omniscient Reader's Viewpoint Illustrated Postcards</td>
      </tr>
    </table>
  </section>

  <section id="recommended-product" class="card-gallery">
    <h2 class="card-gallery-title text-align-center">RECOMMENDED PRODUCTS</h2>
    <button class="card-gallery-left-bttn"><i class="fas fa-angle-left"></i></button>
    <div class="card-gallery-content flex-container flex-justify-content-space-between flex-align-items-center overflow-hidden clear-both">
      <div class="product-card">
        <a href="../product-detail"><img alt="image of a product"
                                         src="../../../media/image/book_cover/the-blind_prince_cover.jpg"></a>
        <div class="product-card-details">
          <a class="product-card-title" href="../product-detail">Product Title Goes Here</a>
          <a class="product-card-shop" href="../">Shop Name Goes Here</a>
          <p class="product-card-price">$12.99</p>
          <div class="product-card-sale-card">15/2/2013</div>
        </div>
      </div>

      <div class="product-card">
        <a href="../product-detail"><img alt="image of a product"
                                         src="../../../media/image/book_cover/true_beauty_cover.jpg"></a>
        <div class="product-card-details">
          <a class="product-card-title" href="../product-detail">Product Title Goes Here</a>
          <a class="product-card-shop" href="../">Shop Name Goes Here</a>
          <p class="product-card-price">$6.50</p>
          <div class="product-card-sale-card">20/12/2012</div>
        </div>
      </div>

      <div class="product-card">
        <a href="../product-detail"><img alt="image of a product"
                                         src="../../../media/image/book_cover/rebirth_cover.jpg"></a>
        <div class="product-card-details">
          <a class="product-card-title" href="../product-detail">Product Title Goes Here</a>
          <a class="product-card-shop" href="../">Shop Name Goes Here</a>
          <p class="product-card-price">$7.30</p>
          <div class="product-card-sale-card">3/8/2019</div>
        </div>
      </div>

      <div class="product-card">
        <a href="../product-detail"><img alt="image of a product"
                                         src="../../../media/image/book_cover/humor_me_cover.jpg"></a>
        <div class="product-card-details">
          <a class="product-card-title" href="../product-detail">Product Title Goes Here</a>
          <a class="product-card-shop" href="../">Shop Name Goes Here</a>
          <p class="product-card-price">$12.99</p>
          <div class="product-card-sale-card">1/4/2017</div>
        </div>
      </div>

      <div class="product-card">
        <a href="../product-detail"><img alt="image of a product"
                                         src="../../../media/image/book_cover/heartstopper_cover.jpg"></a>
        <div class="product-card-details">
          <a class="product-card-title" href="../product-detail">Product Title Goes Here</a>
          <a class="product-card-shop" href="../">Shop Name Goes Here</a>
          <p class="product-card-price">$12.99</p>
          <div class="product-card-sale-card">14/2/2013</div>
        </div>
      </div>

      <div class="product-card">
        <a href="../product-detail"><img alt="image of a product"
                                         src="../../../media/image/book_cover/gyaga_cover.jpg"></a>
        <div class="product-card-details">
          <a class="product-card-title" href="../product-detail">Product Title Goes Here</a>
          <a class="product-card-shop" href="../">Shop Name Goes Here</a>
          <p class="product-card-price">$12.99</p>
          <div class="product-card-sale-card">14/2/2013</div>
        </div>
      </div>
    </div>
    <button class="card-gallery-right-bttn"><i class="fas fa-angle-right"></i></button>
  </section>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>