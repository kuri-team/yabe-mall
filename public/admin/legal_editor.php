<?php require_once("../../private/initialize.php"); ?>

<?php
    
    $page_title = "Yabe CMS Administrator's Dashboard";
    $style_sheets = [
        "/css/common.css",
        "/css/admin.css",
        "/css/page-editor.css"
    ];
    $scripts = [
        "/js/common.js",
        "/js/page-editor.js",
    ];
    
    // Automatic redirect to Administrator Authentication page if user hasn't logged in
    if (isset($_SESSION["admin_logged_in"]) && !$_SESSION["admin_logged_in"]) {
        redirect_to(url_for("/admin/auth"));
    }
    
    
    // Legal page editor page selection logic
    $a_page_selected = $_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["page"]);
    $filepath = null;
    if ($a_page_selected) {
        switch ($_GET["page"]) {
            case "copyright":
                $filepath = SHARED_PATH . "/legal/copyright.php";
                break;
            case "tos":
                $filepath = SHARED_PATH . "/legal/tos.php";
                break;
            case "privacy_policy":
                $filepath = SHARED_PATH . "/legal/privacy-policy.php";
                break;
        }
    }
    
    
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["page_editor"])) {
        file_put_contents(SHARED_PATH . $filepath, $_POST["edit"], LOCK_EX);
        new_logs_entry("../../private/logs.txt", "CMS Page Editor | modified " . SHARED_PATH . $filepath);
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
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin/legal_editor.php");?>">Edit Legal Information</a></li>
        <li><a href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>

    <section class="content-child admin-content">
      <form id="page-select-form" class="flex-container flex-justify-content-center" action="legal_editor.php" method="get" target="_self">
        <label for="page-select" class="mr-20">Select a page to edit:</label>
        <select id="page-select" name="page" required onchange="document.getElementById('page-select-form').submit();">
          <option name="page" value="not_selected" hidden <?php if ($_SERVER["REQUEST_METHOD"] !== "GET") { echo "selected"; } ?>></option>
          <option name="page" value="copyright" <?php if ($a_page_selected && $_GET["page"] === "copyright") { echo "selected"; } ?>>Copyright</option>
          <option name="page" value="tos" <?php if ($a_page_selected && $_GET["page"] === "tos") { echo "selected"; } ?>>Terms of Service</option>
          <option name="page" value="privacy_policy" <?php if ($a_page_selected && $_GET["page"] === "privacy_policy") { echo "selected"; } ?>>Privacy Policy</option>
        </select>
      </form>

      <?php
          
          if ($a_page_selected) {
              include(SHARED_PATH . "/page-editor.php");
          }
          
      ?>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

