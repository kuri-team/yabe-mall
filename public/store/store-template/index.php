<?php require_once('../../../private/initialize.php'); ?>

<?php

    $page_title = 'HSY Shop | Home';
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

?>

  <main>
    <ul class="breadcrumb">
      <li><a href="../../mall/">Home</a>/</li>
      <li><a href="../../mall/browse/by-store/by-category.php">Bookstore</a>/</li>
      <li><a href="./">HSY Shop</a></li>
    </ul>

    <div class="content-body">
      <section class="store-header">
        <img class="store-img" alt="image of a shop"
          src="../../media/image/hsy_shop/HSY_banner.jpg">
        <img class="store-card-thumbnail circle-img" alt="image representation of a shop"
          src="../../media/image/hsy_shop/HSY_avatar.jpg">

        <h2>HSY Shop</h2>
        <a href="./"><i class="fab fa-facebook-square"></i></a>
        <a href="./"><i class="fab fa-twitter-square"></i></a>
        <a href="./"><i class="fab fa-youtube"></i></a>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur dolores magni, 
          aliquam perferendis debitis ipsa necessitatibus nisi quisquam velit ex dolorem, facilis
          et rerum quod blanditiis ducimus voluptatem adipisci!</p>
        
        <div class="store-nav">
          <div class="store-nav-bttn"><a href="./">HOME</a></div>
            <div class="store-nav-bttn store-nav-dropdown">PRODUCTS
              <i class="fas fa-caret-down"></i>
              <div class="store-nav-dropdown-list">
                <a href="browse-product/by-category.php">CATEGORY</a>
                <hr>
                <a href="browse-product/by-date.php">DATE</a>
              </div>
            </div>
          <div class="store-nav-bttn"><a href="./pages/contact.php">CONTACT</a></div>
          <div class="store-nav-bttn"><a href="./pages/bio.php">BIO</a></div>

          <div id="responsive-store-navbar">
            <input type="checkbox" id="navbar-icon">
            <div class="flex-container flex-align-items-center flex-direction-column">
              <label for="navbar-icon" class="responsive-store-navbar-title">MENU</label>
              <i class="fas fa-caret-down"></i>
            </div>
            <ul class="responsive-store-navbar-content">
              <li><a href="./">Home</a></li>
              <li>
                <input type="checkbox" id="nav-product-bttn">
                <label for="nav-product-bttn">Products</label>
                <i class="fas fa-caret-down"></i>
                <ul class="responsive-store-navbar-content-dropdown">
                  <li><a href="browse-product/by-category.php">Category</a></li>
                  <li><a href="browse-product/by-date.php">Date</a></li>
                </ul>
              </li>
              <li><a href="pages/contact.php">Contact</a></li>
              <li><a href="pages/bio.php">Bio</a></li>
            </ul>
          </div>
        </div>
      </section>

      <section class="store-home-content">
        <section class="store-home-content-new mb-80">
          <div class="store-home-content-header text-align-center">
            <h1 class="mr-10">NEW PRODUCTS</h1>
            <a href="browse-product/by-date.php">VIEW MORE</a>
          </div>

          <section class="store-product-cards">
            <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY_main_cover_square.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Purple Hyacinth Comic</a>
                  <p class="product-card-shop">Sophism &amp; Ephemerys</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">18/6/2018</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail-2"><img alt="image of a product"
                  src="../../media/image/product-detail-2/yoohankim-trio_square.png"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail-2">Omniscient Reader's Viewpoint Novel</a>
                  <p class="product-card-shop">Sing Shong</p>
                  <p class="product-card-price">$13.50</p>
                  <div class="product-card-sale-card">6/1/2018</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY3.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY4.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY5.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY6.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>
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
              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY7.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY8.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/HSY9.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/dan-gold-zvFrn0Ws7cw-unsplash.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/paolo-chiabrando-9dXSoi6VXEA-unsplash.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>

              <div class="product-card">
                <a href="./product-detail"><img alt="image of a product"
                  src="../../media/image/hsy_shop/thought-catalog-V5BGaJ0VaLU-unsplash.jpg"></a>
                <div class="product-card-details">
                  <a class="product-card-title" href="./product-detail">Product Title Goes Here</a>
                  <p class="product-card-shop">Short Description Goes Here</p>
                  <p class="product-card-price">$16.95</p>
                  <div class="product-card-sale-card">1/4/2020</div>
                </div>
              </div>
            </div>
          </section>
        </section>
      </section>

      <section class="store-footer flex-container flex-justify-content-center
        flex-align-items-center flex-wrap">
        <div class="store-logo"><a href="./">
          <img class="circle-img" src="../../media/image/hsy_shop/HSY_avatar.jpg" alt="Store logo"></a>
        </div>
        <div class="store-footer-bttn"><a href="../../mall/legal/copyright">Copyright</a></div>
        <div class="store-footer-bttn"><a href="../../mall/legal/tos">Term of Service</a></div>
        <div class="store-footer-bttn"><a href="../../mall/legal/privacy-policy">Privacy Policy</a></div>

        <div id="responsive-store-footer">
          <input type="checkbox" id="store-footer-icon">
          <label for="store-footer-icon" class="responsive-store-footer-title" onclick="displayDropdown()">Legal</label>
          <ul id="responsive-store-footer-dropdown">
            <li><a href="../../mall/legal/copyright">Copyright</a></li>
            <li><a href="../../mall/legal/tos">Term of Service</a></li>
            <li><a href="../../mall/legal/privacy-policy">Privacy Policy</a></li>
          </ul>
        </div>
      </section>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>