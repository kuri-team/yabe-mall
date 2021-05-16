<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/database.php");
    
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
        redirect_to(url_for("/admin/auth"));
    }
    
    include(SHARED_PATH . "/top.php");

?>

<main>
  <ul class=breadcrumb>
    <li><a href="<?=url_for("/mall");?>"><i class="fas fa-long-arrow-alt-left mr-10"></i>Back to Yabe Mall</a></li>
  </ul>

  <h1 class="content-title">Yabe CMS Administrator's Dashboard</h1>
  <div class="content-body">
    <aside class="content-aside-nav content-child">
      <ul>
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin");?>">Welcome</a></li>
        <li><a href="<?=url_for("");?>">PHPInfo</a></li>
        <li><a href="<?=url_for("");?>">Logs</a></li>
        <li><a href="<?=url_for("");?>">Database Management</a></li>
        <li><a href="<?=url_for("");?>">File Management</a></li>
        <li><a href="<?=url_for("");?>">Page Editor</a></li>
        <li><a href="<?=url_for("");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("");?>">Development Mode</a></li>
        <li><a href="<?=url_for("");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

