<?php
    
    if (!isset($page_title)) {
        $page_title = "Yabe";
    }
    
    if (!isset($style_sheets)) {
        $style_sheets = ["/css/common.css"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?=url_for("/media/image/favicon.ico");?>" type="image/x-icon">

  <?php
      foreach ($style_sheets as $style_sheet) {
          echo "<link rel='stylesheet' href='" . url_for($style_sheet) . "'>";
      }
  ?>

  <script src="https://kit.fontawesome.com/492245eeb1.js" crossorigin="anonymous"></script>

  <title><?=$page_title;?></title>
</head>
<body>

<div id="dimmed-page"></div>

<header>
  <nav>
    <span id="nav-logo"><a href="<?=url_for("/mall/");?>"><img class="nav-logo-sprite" alt="Yabe logo" src="<?=url_for("/media/vector/logo-light.svg");?>"></a></span>
    <div id="nav-search-filter">Filter<i class="fas fa-caret-down ml-10"></i>
      <div id="nav-search-filter-level-1">
        <div class="nav-search-filter-option">All</div>
        <hr>
        <div class="nav-search-filter-option">Products
          <div id="nav-search-filter-level-2-1">
            <div class="nav-search-filter-option">Category</div>
            <hr>
            <div class="nav-search-filter-option">Date</div>
          </div>
        </div>
        <hr>
        <div class="nav-search-filter-option">Stores
          <div id="nav-search-filter-level-2-2">
            <div class="nav-search-filter-option">Category</div>
            <hr>
            <div class="nav-search-filter-option">Name</div>
          </div>
        </div>
      </div>
    </div>
    <div id="nav-search">
      <form action="<?=url_for("/mall/browse");?>" method="get" target="_blank">
        <label for="q"></label>
        <input class="nav-seach-bar" id="q" name="q" type="search" placeholder="Search" value="">
      </form>
    </div>
    <div class="nav-search-bttn"><i class="fas fa-search"></i></div>
    <div>
      <a href="<?=url_for("/mall/cart");?>"><button class="nav-cart-bttn"><i class="fas fa-shopping-cart"></i>Cart</button></a>
    </div>
    <span id="nav-account">
      <?php
    
          if (isset($_SESSION["logged_in"])) {
              if ($_SESSION["logged_in"]) {
                  echo "<span>
                          <a href='" . url_for("/mall/account/my-account") . "'>My Account</a>
                        </span>";
              } else {
                  echo "<span>
                          <a href='" . url_for("/mall/account/login") . "'>Login</a>
                          <span class='vl'></span>
                          <a href='" . url_for("/mall/account/register") . "'>Register</a>
                        </span>";
              }
          }
          
      ?>
    </span>

    <span class="mobile-only">
        <button onclick="toggleMobileMenu()" class="mobile-menu-bttn"><i class="fas fa-bars" id="mobile-menu-icon"></i></button>
      </span>
  </nav>

  <div class="mobile-menu" id="mobile-menu">
    <ul>
      <li class="mobile-menu-cart"><a href="<?=url_for("/mall/cart");?>"><i class="fas fa-shopping-cart"></i>Cart</a></li>
      <li class="mobile-menu-my-account"><a href="<?=url_for("/mall/account/my-account");?>">My Account</a></li>
      <li class="mobile-menu-login"><a href="<?=url_for("/mall/account/login");?>">Login</a></li>
      <li><a href="<?=url_for("/mall/");?>">Home</a></li>
      <li><a href="<?=url_for("/mall/browse");?>">Browse</a></li>
      <li><a href="<?=url_for("/mall/about-us");?>">About Us</a></li>
      <li><a href="<?=url_for("/mall/contact");?>">Contact Us</a></li>
      <li><a href="<?=url_for("/mall/support/faq");?>">FAQs</a></li>
    </ul>
  </div>
</header>