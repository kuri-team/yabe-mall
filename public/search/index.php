<?php
    
    require_once("../../private/initialize.php");
    use Kuri\Yabe\database\Entry;
    
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
        $entry = new Entry("0", "Hello");
        print_r($entry);
    
    ?>
  </pre>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
