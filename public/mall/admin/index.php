<?php
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/database.php");
    
?>

<?php
    
    $page_title = "Yabe CMS Administrator's Dashboard";
    $style_sheets = [
        "/css/common.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    // Automatic redirect to Administrator Authentication page if user hasn't logged in
    if (isset($_SESSION["admin_logged_in"]) && !$_SESSION["admin_logged_in"]) {
        redirect_to(url_for("/mall/admin/auth"));
    }
    
    include(SHARED_PATH . "/top.php");

?>

<main>
  <ul class=breadcrumb>
    <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
    <li><a href="<?=url_for("/mall/admin");?>">Yabe CMS Administrator's Dashboard</a></li>
  </ul>

  <h1 class="content-title">Yabe CMS Administrator's Dashboard</h1>

  <div class="content-body">
    <a href="<?=url_for("/mall/admin/auth?q=logout");?>">Log out</a>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

