<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/logsman.php");
    
?>

<?php
    
    $page_title = "Yabe CMS Administrator's Dashboard";
    $style_sheets = [
        "/css/common.css",
        "/css/admin.css"
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    // Automatic redirect to Administrator Authentication page if user hasn't logged in
    if (isset($_SESSION["admin_logged_in"]) && !$_SESSION["admin_logged_in"]) {
        redirect_to(url_for("/admin/auth"));
    }
    
    
    // About Us Editor logic
    $filepath = SHARED_PATH . "/about-us-bio.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit"])) {
        file_put_contents($filepath, $_POST["bio-edit"],LOCK_EX);
        new_logs_entry("../../private/logs.txt","CMS About Us Editor | modified $filepath");
    }
    
    
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
        <li><a href="<?=url_for("/admin/manual.php");?>">Administrator's Manual</a></li>
        <li><a href="<?=url_for("/admin/phpinfo.php");?>">PHPInfo</a></li>
        <li><a href="<?=url_for("/admin/logs.php");?>">Logs</a></li>
        <li><a href="<?=url_for("/admin/database_man.php");?>">Database Manager</a></li>
        <li><a href="<?=url_for("/admin/page_editor.php");?>">Page Editor</a></li>
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>

    <section class="content-child admin-content">
      <form action="about_us.php" method="post" target="_self">
        <label class="page-editor-label" for="bio-edit">About Us Bio</label>
        <textarea id="bio-edit" class="page-editor-textarea" rows="10" name="bio-edit"><?php
              
              echo file_get_contents($filepath);
              
          ?></textarea>
        <a href="about_us.php" class="cms-editor-reset">Reset</a>
        <input type="submit" name="edit" value="MODIFY">
      </form>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

