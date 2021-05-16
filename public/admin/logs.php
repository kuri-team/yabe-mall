<?php
    
    require_once("../../private/initialize.php");
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
    
    // GET query logic
    if (isset($_GET["q"])) {
        // Log out logic
        if (isset($_GET["q"]) && $_GET["q"] === "clear_entries") {
            clear_logs_entry("../../private/logs.txt", ALL_ENTRIES);
        }
    }
    
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
  <div class="content-body flex-container">
    <aside class="content-aside-nav content-child">
      <ul>
        <li><a href="<?=url_for("/admin");?>">Welcome</a></li>
        <li><a href="<?=url_for("/admin/phpinfo.php");?>">PHPInfo</a></li>
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin/logs.php");?>">Logs</a></li>
        <li><a href="<?=url_for("/admin/database_man.php");?>">Database Management</a></li>
        <li><a href="<?=url_for("/admin/page_editor.php");?>">Page Editor</a></li>
        <li><a href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/manual.php");?>">Administrator's Manual</a></li>
        <li><a href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>
        
    <section class="content-child admin-content">
      <article>
        <label for="phpinfo">Content of <strong>logs.txt</strong></label>
        <textarea id="phpinfo" class="textarea-nowrap" rows="35" disabled>
          <?php
              
              echo "\n";
              readfile("../../private/logs.txt");
              
          ?>
        </textarea>
        <a href="<?=url_for("/admin/logs.php?q=clear_entries");?>">Clear all log entries</a>
      </article>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
