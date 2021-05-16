<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/csv.php");
    require_once("../../private/logsman.php");

?>

<?php
    
    $page_title = "Yabe CMS Administrator's Dashboard";
    $style_sheets = [
        "/css/common.css",
        "/css/admin.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    // Automatic redirect to Administrator Authentication page if user hasn't logged in
    if (isset($_SESSION["admin_logged_in"]) && !$_SESSION["admin_logged_in"]) {
        redirect_to(url_for("/admin/auth"));
    }
    
    
    $admin_data = read_csv("../../private/database/admin.csv", true);
    
    
    include(SHARED_PATH . "/top.php");

?>

<main>
  <ul class=breadcrumb>
    <li><a href="<?=url_for("/mall");?>"><i class="fas fa-long-arrow-alt-left mr-10"></i>Back to Yabe Mall</a></li>
  </ul>
    
  <h1 class="content-title">Yabe CMS Administrator's Dashboard</h1>
  <div class="content-body flex-container">
    <aside class="content-aside-nav content-child">
      <ul>
        <li><a href="<?=url_for("/admin");?>">Welcome</a></li>
        <li><a href="<?=url_for("/admin/phpinfo.php");?>">PHPInfo</a></li>
        <li><a href="<?=url_for("/admin/logs.php");?>">Logs</a></li>
        <li><a href="<?=url_for("/admin/databse_man.php");?>">Database Management</a></li>
        <li><a href="<?=url_for("/admin/file_man.php");?>">File Management</a></li>
        <li><a href="<?=url_for("/admin/page_editor.php");?>">Page Editor</a></li>
        <li><a href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/development_mode.php");?>">Development Mode</a></li>
        <li><a href="<?=url_for("/admin/manual.php");?>">Administrator's Manual</a></li>
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>
        
    <section class="content-child admin-content">
      <p>Current Admin username: <strong><?=$admin_data[0]["username"];?></strong></p>
      
      <form action="password.php" method="post" target="_self" autocomplete="off">
        <div class="flex-container flex-direction-column mt-50">
          <label for="username">New Username (Leave empty to keep current)</label>
          <input id="username" name="username" type="text" value="">
  
          <label for="current-pwd">Current Password</label>
          <input id="current-pwd" name="current_pwd" type="password" required>
  
          <label for="new-pwd">New Password</label>
          <input id="new-pwd" name="new_pwd" type="password" required>
        </div>
        
        <div class="flex-container flex-justify-content-space-between">
          <input name="reset" type="reset" value="RESET">
          <input name="change_password" type="submit" value="SUBMIT">
        </div>
      </form>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
