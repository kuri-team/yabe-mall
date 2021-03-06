<?php require_once("../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe | Search";
    $style_sheets = [
        "/css/common.css",
        "/css/cards.css",
        "/css/search.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    
    // Search logic
    $query = "";
    $filter = "";
    $search = null;
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["q"]) && isset($_GET["filter"])) {
        $query = trim($_GET["q"]);
        $filter = $_GET["filter"];
        if ($filter === "Filter") {
            $filter = "All";
        }
        $search = new Search($query, $_GET["filter"]);
        $page_title .= " \"{$query}\"";
        $nav_search_query = $query;
        $nav_search_filter = $filter;
    }
    
    $no_result = false;
    if ($search === null || count($search->results) === 0) {
        $no_result = true;
    }
    
    
    include(SHARED_PATH . "/top.php");
    
?>

<ul class=breadcrumb>
  <li><a href="<?=url_for("/mall");?>"><i class="fas fa-long-arrow-alt-left mr-10"></i>Back to Mall</a></li>
</ul>

<h1 class="content-title">SEARCH RESULTS FOR "<?=strtoupper($query);?>" IN "<?=strtoupper($filter);?>"</h1>
<main class="content-body">
  <?php
      
      if ($no_result) {
          echo "<div class='search-section'>";
          echo "<div class='message-warning mt-20'>No result. Please try a different keyword/keywords combination.</div>";
          echo "</div>";
      }
  
  ?>
  
  <?php
    
      foreach ($search->results as $result) {
          if (get_class($result) === "DatabaseProduct") {
              echo "<h2 class='search-section-title text-align-center'>\"" . strtoupper($query) . "\" PRODUCTS</h2>";
              break;
          }
      }
      
  ?>
  <section class="search-section">
    <div class="flex-container flex-justify-content-space-around flex-align-items-center flex-wrap">
      <?php
      
          if (!$no_result) {
              foreach ($search->results as $result) {
                  if (get_class($result) === "DatabaseProduct") {
                      echo "<div class='product-card'>
                              <a href='" . url_for("/store/content/product-detail?id={$result->id}") . "'><img alt='image of a product' src='" . url_for("media/image/placeholder_262x250.png") . "'></a>
                              <div class='product-card-details'>
                                <a class='product-card-title' href='" . url_for("/store/content/product-detail?id={$result->id}") . "'>{$result->name}</a>
                                <a class='product-card-shop' href='" . url_for("/store/content?id={$result->store->id}") . "'>{$result->store->name}</a>
                                <p class='product-card-price'>$" . number_format($result->price, 2, ".", "") . "</p>
                                <div class='product-card-sale-card'>" . date("Y-m-d", $result->created_time) . "</div>
                              </div>
                            </div>";
                  }
              }
          }
      
      ?>
  </section>
    
    <?php
    
        foreach ($search->results as $result) {
            if (get_class($result) === "DatabaseStore") {
                echo "<h2 class='search-section-title text-align-center'>\"" . strtoupper($query) . "\" STORES</h2>";
                break;
            }
        }
    
    ?>
  <section class="search-section">
    <div class="flex-container flex-justify-content-space-around flex-align-items-center flex-wrap mb-50">
        <?php
            
            if (!$no_result) {
                foreach ($search->results as $result) {
                    if (get_class($result) === "DatabaseStore") {
                        $store_link = url_for("/store/content?id=" . preg_replace("/store/", "", $result->id));
                        echo "<div class='store-card'>
                                <a href='{$store_link}'><img class='store-card-thumbnail' alt='image representation of a shop' src='" . url_for("media/image/profile-placeholder_143x143.png") . "'></a>
                                <a class='store-card-name' href='{$store_link}'><h2>{$result->name}</h2></a>
                                <p class='search-store-category text-align-center'><strong>Category</strong><br>{$result->category->name}</p>
                              </div>";
                    }
                }
            }
        
        ?>
  </section>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
