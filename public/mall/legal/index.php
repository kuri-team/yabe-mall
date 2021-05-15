<?php require_once("../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | Legal";
$style_sheets = [
    "/css/common.css",
    "/css/legal/legal.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>

  <h1>To be further implemented</h1>
  <ul>
    <li><a href="<?=url_for("/mall/legal/tos");?>">Terms of Service</a></li>
    <li><a href="<?=url_for("/mall/legal/privacy-policy");?>">Privacy Policy</a></li>
    <li><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></li>
  </ul>
  
  <main>
  
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>