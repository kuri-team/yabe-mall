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
        <img class="far" src="../media/image/yabe_cursor.gif" alt="YABE crying face">
        <div class="second-4">4</div>
        <div class="message">SORRY PAGE NOT FOUND
            <p>Don't cry. Let's discover more interesting features on <a href="../mall/index.php">Home</a> !</p>
        </div>
    </div>
    </body>

<?php include(SHARED_PATH . "/bottom.php"); ?>