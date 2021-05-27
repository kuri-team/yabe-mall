<?php require_once("../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe | Browse | Products";
    $style_sheets = [
        "/css/common.css",
        "/css/404.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    include(SHARED_PATH . "/top.php");

?>
    <body>
    <div class="container">
        <div class="first-4">4</div>
        <i class="far fas fa-circle-notch fa-spin"></i>
        <div class="second-4">4</div>
        <div class="message">Page might be moved or not existed due to Coronavirus Virus.
            <p>Let's head back to <a href="../mall/index.php">Home</a> !</p>
        </div>
    </div>
    </body>

<?php include(SHARED_PATH . "/bottom.php"); ?>