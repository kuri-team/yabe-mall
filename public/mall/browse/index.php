<?php require_once("../../../private/initialize.php"); ?>

<?php

$page_title = 'Yabe | Browse';
$style_sheets = [
    "/css/common.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>
  <main>
    <ul class="breadcrumb">
      <li><a href="../">Home</a>/</li>
      <li><a href="#">Browse</a></li>
    </ul>
    <h1 class="content-title">BROWSE</h1>

    <div class="content-body">
      <p>Advanced browsing page with filtering features to be further implemented with PHP</p>

      <h2>Browse Products</h2>
      <ul>
        <li><a href="by-product/by-category.php">By Category</a></li>
        <li><a href="by-product/by-date.php">By Date</a></li>
      </ul>

      <h2>Browse Stores</h2>
      <ul>
        <li><a href="by-store/by-category.php">By Category</a></li>
        <li><a href="by-store/by-name.php">By Name</a></li>
      </ul>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>