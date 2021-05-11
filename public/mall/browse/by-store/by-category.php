<?php require_once('../../../../private/initialize.php'); ?>

<?php

$page_title = 'Yabe | Home';
$style_sheets = [
    "/css/common.css",
    "/css/browse.css",
    "/css/cards.css",
    "/css/pagination.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . '/top.php');

?>

<main id="content">

    <ul class=breadcrumb>
      <li><a href="../../">Home</a>/</li>
      <li><a href="./">Browse Stores</a>/</li>
      <li><a href="#">By Category</a></li>
    </ul>
    
  <div class="content-body">
    <div>
      <label><select class="select-list">
        <option value="all-categories">ALL CATEGORIES</option>
        <option value="accessories">Accessories</option>
        <option value="computers">Computers</option>
        <option value="electronics">Electronics</option>
        <option value="makeup">Makeup</option>
        <option value="skincare">Skincare</option>
        <option value="shoes">Shoes</option>
        <option value="clothing">Clothing</option>
        <option value="toys">Toys</option>
        <option value="stationery">Stationery</option>
        <option value="cookware">Cookware</option>
      </select></label>
    </div>

    <div class="store-list">
      <div class="flex-container flex-justify-content-space-evenly flex-wrap">
        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/apple_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/birkenstock_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/canon_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/hp_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/dermalogica_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/floralpunk_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/jabra_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/jordan_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/larocheposay_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/lenovo_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/paula_choice_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/nike_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>
      </div>      
    </div>

    <div class="pagination">
      <a href="#" class="current-page">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">&gt;</a>
      <a href="#">&raquo;</a>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . '/bottom.php'); ?>