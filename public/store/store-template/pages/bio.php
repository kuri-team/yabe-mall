<?php require_once('../../../../private/initialize.php'); ?>

<?php

    $page_title = 'HSY Shop | Bio';
    $style_sheets = [
        "/css/common.css",
        "/css/store/store.css",
        "/css/store/store-bio.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js",
    ];

    include(SHARED_PATH . '/top.php');

?>

  <main>
    <ul class="breadcrumb">
      <li><a href="../../../mall/">Home</a>/</li>
      <li><a href="../../../mall/browse/by-store/by-category.php">Bookstore</a>/</li>
      <li><a href="../">HSY Shop</a>/</li>
      <li><a href="#">Bio</a></li>
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
          <div class="store-nav-bttn"><a href="../">HOME</a></div>
          <div class="store-nav-bttn store-nav-dropdown">PRODUCTS
            <i class="fas fa-caret-down"></i>
            <div class="store-nav-dropdown-list">
              <a href="../browse-product/by-category.php">CATEGORY</a>
              <hr>
              <a href="../browse-product/by-date.php">DATE</a>
            </div>
          </div>
          <div class="store-nav-bttn"><a href="./contact.php">CONTACT</a></div>
          <div class="store-nav-bttn"><a href="./bio.php">BIO</a></div>

          <div id="responsive-store-navbar">
            <input type="checkbox" id="navbar-icon">
            <div class="flex-container flex-align-items-center flex-direction-column">
              <label for="navbar-icon" class="responsive-store-navbar-title">MENU</label>
              <i class="fas fa-caret-down"></i>
            </div>
            <ul class="responsive-store-navbar-content">
              <li><a href="../">Home</a></li>
              <li>
                <input type="checkbox" id="nav-product-bttn">
                <label for="nav-product-bttn">Products</label>
                <i class="fas fa-caret-down"></i>
                <ul class="responsive-store-navbar-content-dropdown">
                  <li><a href="../browse-product/by-category.php">Category</a></li>
                  <li><a href="../browse-product/by-date.php">Date</a></li>
                </ul>
              </li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="bio.php">Bio</a></li>
            </ul>
          </div>
        </div>
      </section>

      <section id="store-page-content">
        <h2 class="store-content-heading text-align-center">BIO</h2>
        <h3>Our Goal</h3>
        <div class="text-align-justify mb-50">
          <p class="bio-content">Ursaring, kricketune golbat mantyke magneton timburr.
            Kingler gabite jynx patrat bronzor togekiss.</p>
        </div>

        <h3>Our Story</h3>
        <div class="text-align-justify mb-50">
          <p class="bio-content">Archen honchkrow rotom cloyster swinub froslass audino
            buneary sentret. Ivysaur scolipede eelektross giratina gothorita plusle mew.
            Deerling ampharos shelmet seismitoad lumineon pelipper nincada typhlosion remoraid
            terrakion hippowdon jigglypuff dwebble. Kabutops kingler crustle floatzel! Mothim
            mandibuzz wormadam lucario lickitung masquerain, snorunt vulpix magmortar lairon
            sentret kecleon luvdisc. Spoink azumarill hoppip torchic meloetta, servine finneon
            clamperl murkrow. Purrloin litwick surskit buneary zubat elgyem rattata heatran
            cyndaquil. Boldore basculin serperior dialga shellos vanilluxe bibarel shellos.
            Huntail petilil zoroark chimecho cubchoo zweilous smoochum marowak uxie ducklett.</p>

          <p class="bio-content">Sneasel volbeat, magnezone the. Cubone phanpy
            swadloon goldeen metapod! Scolipede mothim politoed onix luxray golduck and ponyta.
            Nidorina kyogre kingler skorupi plusle quagsire snubbull miltank. Eelektross simisage
            carvanha bastiodon. </p>
        </div>

        <h3>Our Leaders</h3>
        <div class="flex-container flex-wrap">
          <div class="shop-founder-ceo text-align-center">
            <img src="../../../media/image/hsy_shop/hansooyoung.jpg"
                 alt="HSY Shop's Founder and CEO" class="circle-img">
            <h4 class="shop-leader-name">Han Sooyoung</h4>
            <p class="shop-leader-position">Founder &amp; CEO</p>
            <p class="text-align-justify bio-content-leaders">Xatu mareep tentacruel cubchoo
              grimer drilbur krookodile charizard luvdisc fraxure smoochum spoink nidoqueen.
              Budew, rhydon lairon terrakion. Vibrava hitmonlee eelektross klinklang psyduck
              crobat slaking ducklett.</p>
          </div>

          <div class="shop-cfo text-align-center">
            <img src="../../../media/image/hsy_shop/neyra.jpg"
                 alt="HSY Shop's CFO" class="circle-img">
            <h4 class="shop-leader-name">Neyra Elena Darcy</h4>
            <p class="shop-leader-position">CFO</p>
            <p class="text-align-justify bio-content-leaders">Murkrow, heatran steelix venipede.
              Alomomola sharpedo gligar prinplup gliscor. Starmie sableye fraxure stunfisk
              staraptor. Kabutops conkeldurr excadrill scrafty timburr banette reuniclus
              kricketot espeon purrloin.</p>
          </div>
        </div>
      </section>

      <section class="store-footer flex-container flex-justify-content-center
        flex-align-items-center flex-wrap">
        <div class="store-logo"><a href="../">
          <img class="circle-img" src="../../../media/image/hsy_shop/HSY_avatar.jpg" alt="Store logo"></a>
        </div>
        <div class="store-footer-bttn"><a href="../../../mall/legal/copyright">Copyright</a></div>
        <div class="store-footer-bttn"><a href="../../../mall/legal/tos">Term of Service</a></div>
        <div class="store-footer-bttn"><a href="../../../mall/legal/privacy-policy">
          Privacy Policy</a></div>

        <div id="responsive-store-footer">
          <input type="checkbox" id="store-footer-icon">
          <label for="store-footer-icon" class="responsive-store-footer-title" onclick="displayDropdown()">Legal</label>
          <ul id="responsive-store-footer-dropdown">
            <li><a href="../../../mall/legal/copyright">Copyright</a></li>
            <li><a href="../../../mall/legal/tos">Term of Service</a></li>
            <li><a href="../../../mall/legal/privacy-policy">Privacy Policy</a></li>
          </ul>
        </div>
      </section>
    </div>
  </main>

<?php include(SHARED_PATH . '/bottom.php'); ?>