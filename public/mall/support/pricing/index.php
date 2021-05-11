<?php require_once('../../../../private/initialize.php'); ?>

<?php

    $page_title = 'Yabe | Pricing';
    $style_sheets = [
        "/css/common.css",
        "/css/mall-pricing.css",
    ];
    $scripts = [
        "/js/common.js",
    ];

    include(SHARED_PATH . "/top.php");

?>

  <main id="pricing-content">
    <ul class="breadcrumb">
      <li><a href="../../">Home</a>/</li>
      <li><a href="./">Support</a>/</li>
      <li><a href="#">Pricing</a></li>
    </ul>

    <h2 class="mb-20">SHOPPER</h2>
    <section id="pricing-shopper" class="flex-container flex-wrap">
      <div class="pricing-shopper-normal">
        <h4>YABE&trade; SHOPPER</h4>
        <img class="pricing-img" src="../../../media/image/user.png"
          alt="pie-chart">
        <p class="text-align-center">FREE</p>
        <ul>
          <li><strong>Lorem ipsum</strong><i class="fas fa-check"></i></li>
          <li><strong>Dolor sit amet</strong><i class="fas fa-check"></i></li>
          <li><strong>Consectetur</strong><i class="fas fa-check"></i></li>
          <li>Sed do eiusmo</li>
          <li>Tempor incididunt</li>
        </ul>
      </div>

      <div class="pricing-shopper-premium">
        <h4>YABE&trade; PREMIUM SHOPPER</h4>
        <img class="pricing-img" src="../../../media/image/premium-user.png"
          alt="hexagon">
        <p class="text-align-center">&dollar; 5.99 / month</p>
        <ul>
          <li><strong>Lorem ipsum</strong><i class="fas fa-check"></i></li>
          <li><strong>Dolor sit amet</strong><i class="fas fa-check"></i></li>
          <li><strong>Consectetur</strong><i class="fas fa-check"></i></li>
          <li><strong>Sed do eiusmo</strong><i class="fas fa-check"></i></li>
          <li><strong>Tempor incididunt</strong><i class="fas fa-check"></i></li>
        </ul>
      </div>
    </section>

    <h2 class="mb-40">SELLER</h2>
    <section id="pricing-seller" class="flex-container flex-justify-content-space-between flex-wrap">
      <div class="pricing-seller-normal flex-container flex-direction-column flex-wrap">
        <h5>YABE&trade; SELLER</h5>
        <div class="text-align-center">
          <p class="pricing-seller-fee mb-30"><strong>28.99</strong> per month</p>
          <img class="pricing-img" src="../../../media/image/seller.png"
            alt="pie-chart">
            <p><strong>&dollar;28.99</strong> RENT</p>
            <p><strong>10&percnt;</strong> COMMISSION</p>
        </div>
      </div>

      <div class="pricing-seller-premium flex-container flex-direction-column flex-wrap">
        <h5>YABE&trade; PREMIUM SELLER <i class="fas fa-crown ml-10"></i></h5>
        <div class="text-align-center">
          <p class="pricing-seller-fee mb-30"><strong>38.99</strong> per month</p>
          <img class="pricing-img" src="../../../media/image/premium-seller.png"
            alt="hexagon">
            <p><strong>&dollar;28.99</strong> RENT</p>
            <p><strong>8&percnt;</strong> COMMISSION</p>
            <p><strong>SPONSORED</strong> AD</p>
            <p><strong>CUSTOM</strong> PROMO</p>
        </div>
      </div>

      <div class="pricing-seller-notice flex-container flex-direction-column flex-wrap">
        <h5>NOTICE</h5>
        <ul>
          <li>Lorem ipsum</li>
          <li>Dolor sit amet</li>
          <li>Consectetur adipisicin</li>
          <li>Sed do eiusmo</li>
          <li>Tempor incididunt</li>
        </ul>
        <hr>
        <div class="flex-container flex-wrap">
          <img src="../../../media/image/Kieran.jpg"
               alt="image of Yabe's CEO" class="circle-img">
          <div class="pricing-seller-notice-info">
            <h4 class="pricing-seller-notice-heading">Kieran White</h4>
            <p class="pricing-seller-notice-subheading">Founder & CEO Yabe Inc.</p>
          </div>
        </div>
        <p class="pricing-seller-notice-details text-align-justify">Lorem ipsum dolor sit amet
          consectetur adipisicing elit. Quidem, error at eaque, hic, ut impedit!
        </p>
      </div>
    </section>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>