<?php require_once("../../../private/initialize.php"); ?>

<?php

    $page_title = "Yabe | Support";
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
  <li><a href="<?=url_for("/mall/support/faq");?>">Frequently Asked Questions</a></li>
  <li><a href="<?=url_for("/mall/support/pricing");?>">Pricing</a></li>
</ul>

<?php include(SHARED_PATH . "/bottom.php"); ?>