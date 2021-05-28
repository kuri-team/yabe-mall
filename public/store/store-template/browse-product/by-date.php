<?php

    require_once("../../../../private/initialize.php");
    require_once("../../../../private/browse.php");
    require_once(PRIVATE_PATH . "\csv.php");
    require_once(PRIVATE_PATH . "\dynamic-display.php");

?>

<?php
    
    // get all stores and products data
    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    $products = read_csv(PRIVATE_PATH . "\database/products.csv", true);
    
	no_id_redirect(count($stores));
    
    $specific_store = get_item_data($stores);
    
    
    $page_title = $specific_store["name"] . " | By Date";
    $style_sheets = [
        "/css/common.css",
        "/css/cards.css",
        "/css/store/store.css",
        "/css/store/store-browse.css",
        "/css/pagination.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js",
    ];
    

    // default browse option
    if (!isset($_GET["browse-option"])) {
        $_GET["browse-option"] = "Newest";
    }
    if (!isset($_GET["page"])) {
        $_GET["page"] = 1;
    }

    // get all products from the store
    $products_from_store = get_specific_store_products($products, $specific_store);

    $max_products = 2; // maximum number of stores displayed on the page

    $by_date_options = ["Newest", "Oldest"];

     function display_product_cards($product) {
         echo "<div class='product-card'>";
         echo "<a href='" . url_for("/store/store-template/product-detail?id=" . $product["id"]) . "'>
                <img alt='image of a product' src='../../../media/image/placeholder_262x250.png'></a>";
         echo "<div class='product-card-details'>";
         echo "<a class='product-card-title' href='" . url_for("/store/store-template/product-detail?id=" . $product["id"]) . "'>" . $product["name"] . "</a>";
         echo "<p class='product-card-shop'>Short description</p>";
         echo "<p class='product-card-price'>&dollar;" . $product["price"] . "</p>";
         echo "<div class='product-card-sale-card'>" . substr($product["created_time"],0,10) . "</div>";
         echo "</div>" . "\n" . "</div>";
     }


    include(SHARED_PATH . "/top.php");

?>

  <main>
      <?php require_once(SHARED_PATH . "/store/store-header.php"); ?>
      <form id="dropdown_form" method="get" action="" autocomplete="off">
      <label>

          <?php

          echo "
                <input type='hidden' name='id' value='{$_GET["id"]}'>
              ";

          ?>

          <select class="select-list" id="browse-option" name="browse-option" onchange="this.form.submit()">
              <?php
                  foreach($by_date_options as $option) {
                      if ($_GET['browse-option'] != $option) {
                          echo "<option value='$option' name='$option' id='dropdown-value'>$option</option>";
                      } else { //set selected value as default displayed value
                          echo "<option value='$option' name='$option' id='dropdown-value' selected='selected'>$option</option>";
                      }
                  }
              ?>
      </select>
      </label>
      </form>

      <section class="store-product-cards">
          <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
              <?php
              function date_sort($product1, $product2) {
                  $date1 = strtotime($product1['created_time']);
                  $date2 = strtotime($product2['created_time']);
                      if ($_GET["browse-option"] === "Newest") {
                          return $date2 - $date1;
                      }
                      else if ($_GET["browse-option"] === "Oldest") {
                          return $date1 - $date2;
                      }
                  }

              usort($products_from_store, 'date_sort');

              // display all products of the store
              $min = 0;
              $max = $max_products - $min - 1;
              $page = $_GET["page"];
              $list_length = count($stores);
              $min += $max_products * ($page-1);
              $max += $max_products * ($page-1);
              if ($max > $list_length) {
                  $max = $list_length - 1;
              }
              for ($i = $min; $i <= $max; $i++) {
                  if (isset($products_from_store[$i])) {
                      display_product_cards($products_from_store[$i]);
                  }
              }

              ?>
          </div>
      </section>

      <?php

      $prev = prev_page();
      $next = next_page(count($products_from_store), $max_products);
      echo "
            <div class='pagination-wrapper'>
            <form action='' method='get'>
                <input type='hidden' name='id' value='{$_GET["id"]}'>
                <input type='hidden' name='browse-option' value='{$_GET["browse-option"]}'>
                <button class='prev-button' type='submit' formmethod='get' name='page' value='$prev'>
                    <i class='fas fa-angle-left'></i>
                </button>
                <button class='next-button' type='submit' formmethod='get' name='page' value='$next'>
                    <i class='fas fa-angle-right'></i>
                </button>
            </form>
            </div>
            ";

      $list_length = count($products_from_store);
      if (($list_length % $max_products != 0)) {
          $max_pages = floor($list_length / $max_products) + 1;
      } else {
          $max_pages = $list_length / ($max_products);
      }
      if ($max_pages < 1) {
          $max_pages = 1;
      }
      if ($_GET['page'] < 1 || $_GET['page'] > $max_pages) {
          header("Location: ?id={$_GET["id"]}&browse-option={$_GET["browse-option"]}&page=1");
      }
      ?>

    
      <?php require_once(SHARED_PATH . "/store/store-footer.php"); ?>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>