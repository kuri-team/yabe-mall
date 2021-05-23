<?php require_once("../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe | Home";
    $style_sheets = [
        "/css/common.css",
        "/css/cards.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    
    // Search logic
    $query = "";
    $filter = "";
    $search = null;
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["q"]) && isset($_GET["filter"])) {
        $query = $_GET["q"];
        $filter = $_GET["filter"];
        if ($filter === "Filter") {
            $filter = "All";
        }
        $search = new Search($query, $_GET["filter"]);
    }
    
    $no_result = false;
    if ($search === null || count($search->results) === 0) {
        $no_result = true;
    }
    
    
    include(SHARED_PATH . "/top.php");
    
?>

<h1 class="content-title">SEARCH RESULTS FOR "<?=strtoupper($query);?>" IN "<?=strtoupper($filter);?>"</h1>

<main class="content-body">
  <div class="content-text">
  <?php
      
      if ($no_result) {
          echo "<div class='message-warning'>No result. Please try a different keyword/keywords combination.</div>";
      }
  
  ?>
  </div>
  <section class="content-text">
    <div class="flex-container flex-justify-content-space-around flex-align-items-center flex-wrap">
      <?php
      
          if (!$no_result) {
              foreach ($search->results as $result) {
                  if (get_class($result) === "DatabaseProduct") {
                      echo "<div class='product-card'>
                              <a href='" . url_for("/store/store-template/product-detail?id={$result->id}") . "'><img alt='image of a product' src='" . url_for("media/image/placeholder_262x250.png") . "'></a>
                              <div class='product-card-details'>
                                <a class='product-card-title' href='" . url_for("/store/store-template/product-detail?id={$result->id}") . "'>{$result->name}</a>
                                <a class='product-card-shop' href='" . url_for("/store/store-template?id={$result->store->id}") . "'>{$result->store->name}</a>
                                <p class='product-card-price'>\${$result->price}</p>
                                <div class='product-card-sale-card'>" . date("Y-m-d", $result->created_time) . "</div>
                              </div>
                            </div>";
                  }
              }
          }
      
      ?>
  </section>

  <section class="content-text">
    <div class="flex-container flex-justify-content-space-around flex-align-items-center flex-wrap">
        <?php
            
            if (!$no_result) {
                foreach ($search->results as $result) {
                    if (get_class($result) === "DatabaseStore") {
                        echo "<div class='store-card'>
                                <a href='" . url_for("/store/store-template") . "'><img class='store-card-thumbnail' alt='image representation of a shop' src='" . url_for("media/image/profile-placeholder_143x143.png") . "'></a>
                                <a class='store-card-name' href='" . url_for("/store/store-template?id={$result->id}") . "'>{$result->name}</a>
                                <p class='text-align-center'>In category: {$result->category->name}</p>
                              </div>";
                    }
                }
            }
        
        ?>
  </section>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
