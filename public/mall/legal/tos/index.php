<?php require_once("../../../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe | Terms of Service";
    $style_sheets = [
        "/css/common.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    include(SHARED_PATH . "/top.php");

?>

<main id="content-body">
  <ul class="breadcrumb">
    <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
    <li><a href="<?=url_for("/mall/legal");?>">Legal</a>/</li>
    <li><a href="<?=url_for("/mall/legal/tos");?>">Terms of Service</a></li>
  </ul>

  <h1 class="content-title">TERMS OF SERVICE</h1>
  <div class="content-body">
    <div class="content-text text-align-justify">
      <?php include(SHARED_PATH . "/legal/tos.php"); ?>

      <br><br>
      <button class="content-nav-bttn float-left" onclick="scrollToTop()">TO TOP</button>
      <button class="content-nav-bttn float-right" onclick="previousPage()">BACK</button>
      <br><br>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>