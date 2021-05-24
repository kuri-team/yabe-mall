<?php require_once("../../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | Copyright";
$style_sheets = [
    "/css/common.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>

  <main id="content">
    <ul class="breadcrumb">
      <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
      <li><a href="<?=url_for("/mall/legal");?>">Legal</a>/</li>
      <li><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></li>
    </ul>

    <h1 class="content-title">COPYRIGHT</h1>
    <div class="content-body">
      <div class="content-text text-align-justify">
        <?php include(SHARED_PATH . "/legal/copyright.php"); ?>

        <br><br>
        <button class="content-nav-bttn float-right" onclick="previousPage()">BACK</button>
        <br><br>
      </div>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>