<?php require_once("../../../../private/initialize.php"); ?>

<?php

    $page_title = "HSY Shop | Contact";
    $style_sheets = [
        "/css/common.css",
        "/css/store/store.css",
        "/css/store/store-contact.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js",
    ];

    include(SHARED_PATH . "/top.php");

?>

  <main>
    <ul class="breadcrumb">
      <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
      <li><a href="<?=url_for("/mall/browse/by-store/by-category.php");?>">Bookstore</a>/</li>
      <li><a href="<?=url_for("/store/store-template");?>">HSY Shop</a>/</li>
      <li><a href="<?=url_for("/store/store-template/pages/contact.php");?>">Contact</a></li>
    </ul>

    <div class="content-body">
      <section class="store-header">
        <img class="store-img" alt="image of a shop"
             src="../../../media/image/hsy_shop/HSY_banner.jpg">
        <img class="store-card-thumbnail circle-img" alt="image representation of a shop"
             src="../../../media/image/hsy_shop/HSY_avatar.jpg">

        <h2>HSY Shop</h2>
        <a href="#"><i class="fab fa-facebook-square"></i></a>
        <a href="#"><i class="fab fa-twitter-square"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur dolores magni,
          aliquam perferendis debitis ipsa necessitatibus nisi quisquam velit ex dolorem, facilis
          et rerum quod blanditiis ducimus voluptatem adipisci!</p>

        <div class="store-nav">
              <div class="store-nav-bttn"><a href="<?=url_for("/store/store-template");?>">HOME</a></div>
              <div class="store-nav-bttn store-nav-dropdown">PRODUCTS
                  <i class="fas fa-caret-down store-nav-dropdown-icon"></i>
                  <div class="store-nav-dropdown-list">
                      <a href="<?=url_for("/store/store-template/browse-product/by-category.php");?>">CATEGORY</a>
                      <hr>
                      <a href="<?=url_for("/store/store-template/browse-product/by-date.php");?>">DATE</a>
                  </div>
              </div>
              <div class="store-nav-bttn"><a href="<?=url_for("/store/store-template/pages/contact.php");?>">CONTACT</a></div>
              <div class="store-nav-bttn"><a href="<?=url_for("/store/store-template/pages/bio.php");?>">BIO</a></div>

              <div id="responsive-store-navbar">
                  <input type="checkbox" id="navbar-icon">
                  <div class="flex-container flex-align-items-center flex-direction-column">
                      <label for="navbar-icon" class="responsive-store-navbar-title">MENU</label>
                      <i class="fas fa-caret-down"></i>
                  </div>
                  <ul class="responsive-store-navbar-content">
                      <li><a href="<?=url_for("/store/store-template");?>">Home</a></li>
                      <li>
                          <input type="checkbox" id="nav-product-bttn">
                          <label for="nav-product-bttn">Products</label>
                          <i class="fas fa-caret-down"></i>
                          <ul class="responsive-store-navbar-content-dropdown">
                              <li><a href="<?=url_for("/store/store-template/browse-product/by-category.php");?>">Category</a></li>
                              <li><a href="<?=url_for("/store/store-template/browse-product/by-date.php");?>">Date</a></li>
                          </ul>
                      </li>
                      <li><a href="<?=url_for("/store/store-template/pages/contact.php");?>">Contact</a></li>
                      <li><a href="<?=url_for("/store/store-template/pages/bio.php");?>">Bio</a></li>
                  </ul>
              </div>
        </div>
      </section>

      <h2 class="store-content-heading text-align-center">CONTACT</h2>
      <section id="store-page-content" class="flex-container flex-wrap">
        <div id="store-contact-form">
          <form action="" method="get">
            <label><input class="contact-field" id="full_name" type="text" name="full_name"
                          placeholder="Full Name" required></label>

            <label><input class="contact-field" id="contact_email" type="email" name="contact_email"
                          placeholder="Email" required></label>

            <label><input class="contact-field" id="contact_subject" type="text" name="contact_subject"
                          placeholder="Subject" required></label>

            <label><textarea name="contact_msg" id="contact_msg" placeholder="Message" required></textarea></label>

            <input class="reset-bttn float-left" type="reset" name="reset" value="RESET">
            <input class="submit-bttn float-right" type="submit" name="submit" value="SUBMIT">
          </form>
        </div>

        <div id="store-contact-info" class="text-align-center">
          <h3>Other Contact Info</h3>
          <h4><i class="fas fa-map-marker-alt mr-10"></i>Address</h4>
          <p>702 Nguyen Van Linh, Tan Hung, District 7, HCMC</p>

          <h4><i class="fas fa-envelope mr-10"></i>Email</h4>
          <p><a href="mailto:hsyshop@gmail.com">hsyshop@gmail.com</a></p>

          <h4><i class="fas fa-phone-alt mr-10"></i>Phone Number</h4>
          <p><a href="tel:1502104308">+1 502 104 308</a></p>
        </div>
      </section>

      <section class="store-footer flex-container flex-justify-content-center
        flex-align-items-center flex-wrap">
            <div class="store-logo"><a href="<?=url_for("/store/store-template");?>">
                    <img class="circle-img" src="../../../media/image/hsy_shop/HSY_avatar.jpg" alt="Store logo"></a>
            </div>
            <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></div>
            <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/tos");?>">Term of Service</a></div>
            <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/privacy-policy");?>">
                    Privacy Policy</a></div>

            <div id="responsive-store-footer">
                <input type="checkbox" id="store-footer-icon">
                <label for="store-footer-icon" class="responsive-store-footer-title" onclick="displayDropdown()">Legal</label>
                <ul id="responsive-store-footer-dropdown">
                    <li><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></li>
                    <li><a href="<?=url_for("/mall/legal/tos");?>">Term of Service</a></li>
                    <li><a href="<?=url_for("/mall/legal/privacy-policy");?>">Privacy Policy</a></li>
                </ul>
            </div>
      </section>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>