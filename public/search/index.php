<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/database/autoload.php");
    
?>

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
    
    ?>
  </pre>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
