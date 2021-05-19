<?php require_once("../../private/initialize.php"); ?>

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
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin");?>">Welcome</a></li>
        <li><a href="<?=url_for("/admin/manual.php");?>">Administrator's Manual</a></li>
        <li><a href="<?=url_for("/admin/phpinfo.php");?>">PHPInfo</a></li>
        <li><a href="<?=url_for("/admin/logs.php");?>">Logs</a></li>
        <li><a href="<?=url_for("/admin/database_man.php");?>">Database Manager</a></li>
        <li><a href="<?=url_for("/admin/legal_editor.php");?>">Edit Legal Information</a></li>
        <li><a href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>

    <section class="content-child admin-content">
      <article>
        <p>Welcome to Yabe CMS Administrator's Dashboard.</p>
        <p class="text-align-justify">CMS stands for Content Management System. You can use the administrative tools provided here to modify website database, configure website settings, add/remove account manually, and more advanced operations... If you're new to CMS systems, please refer to the <a href="<?=url_for("");?>">Administrator's Manual</a> to learn how to operate Yabe CMS.</p>
      </article>
      
      <article>
        <label for="sysinfo">System Info:</label>
        <textarea id="sysinfo" class="textarea-nowrap" rows="40" disabled>
          <?php
              
              echo "\nSession ID: ";
              print_r(session_id());
              echo "\n";
    
              echo "\$_SESSION = ";
              print_r($_SESSION);
              echo "\n";
    
              echo "\$_SERVER = ";
              print_r($_SERVER);
              echo "\n";
          
          ?>
        </textarea>
      </article>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

