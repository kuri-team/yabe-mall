<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/csv.php");
    require_once("../../private/database.php");

?>

<?php
    
    $page_title = "Yabe CMS Administrator's Dashboard";
    $style_sheets = [
        "/css/common.css",
        "/css/admin.css"
    ];
    $scripts = [
        "/js/common.js",
        "/js/admin.js",
    ];
    
    // Automatic redirect to Administrator Authentication page if user hasn't logged in
    if (isset($_SESSION["admin_logged_in"]) && !$_SESSION["admin_logged_in"]) {
        redirect_to(url_for("/admin/auth"));
    }
    
    $database_names = list_databases();
    
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
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin/database_man.php");?>">Database Manager</a></li>
        <li><a href="<?=url_for("/admin/legal_editor.php");?>">Edit Legal Information</a></li>
        <li><a href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>

    <section class="content-child admin-content overflow-hidden">
      <noscript>Please enable Javascript for this feature to work properly.</noscript>
      <article>
        <h2>Table of Contents</h2>
        <ul>
          <?php
    
              foreach ($database_names as $database_name) {
                  echo "<li><a href='#" . $database_name . "'>" . $database_name . "</a></li>";
              }
          
          ?>
        </ul>
      </article>
      
      <article>
        <?php
        
            foreach ($database_names as $database_name) {
                echo "<h2 id='" . $database_name . "' class='admin-content-section-title'>" . $database_name . "<i class='fas fa-low-vision toggle-visibility'></i><a href='#'><i class='fas fa-angle-up ml-10'></i></a></h2>";
                $database = read_csv("../../private/database/" . $database_name, true);
                if (count($database) === 0) {
                    $database = read_csv("../../private/database/" . $database_name);
                    print_table($database_name, $database, url_for("/admin/auth/action.php?q=/admin/database_man"),true);
                } else {
                    print_table($database_name, $database, url_for("/admin/auth/action.php?q=/admin/database_man"));
                }
            }
        
        ?>
      </article>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

