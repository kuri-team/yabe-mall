<?php require_once("../../../private/initialize.php"); ?>

<?php

$page_title = 'Yabe | Thank You';
$style_sheets = [
    "/css/common.css",
    "/css/thank-you.css",
];
$scripts = [
    "js/common.js",
    "/js/cart/thank-you.js",
];

include(SHARED_PATH . "/top.php");

?>

<main>
 <div class="content-body">
   <div class="thank-you-frame">
    <i class="fas fa-check"></i>
    <p class="thank-you-sentence">THANK YOU FOR SHOPPING AT YABE</p>
   </div>
    <div class="href-button">
      <a href="../browse/by-product/featured.php"><button class="href-button-continue">CONTINUE SHOPPING</button></a>
      <a href="../"><button class="href-button-home">HOME</button></a>
    </div>
 </div>

</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>