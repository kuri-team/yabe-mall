<?php require_once("../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe | 404";
    $style_sheets = [
        "/css/common.css",
        "/css/404.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    include(SHARED_PATH . "/top.php");

?>

  <div class="container flex-container flex-direction-column">
    <div class="flex-container flex-justify-content-center">
      <div class="first-4">4</div>
      <img class="yabe-crying-face" src="../media/image/yabe_cursor.gif" alt="YABE crying face">
      <div class="second-4">4</div>
    </div>
    
    <div class="flex-container flex-direction-column flex-align-items-center">
      <h2 class="message text-align-center">PAGE NOT FOUND</h2>
      <p class="text-align-center">Don't cry. We have more interesting features than your crush <a href="<?=url_for("/mall");?>">here</a>!</p>
    </div>
  </div>

<?php include(SHARED_PATH . "/bottom.php"); ?>