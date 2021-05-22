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
    
    include(SHARED_PATH . "/top.php");
    
?>

<main>
  <pre>
    <?php
    
        print_r($_GET);
        
        $search = new Search($_GET["q"], $_GET["filter"]);
        
        print_r($search->results);
    
    ?>
  </pre>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
