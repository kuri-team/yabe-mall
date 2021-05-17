<?php
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/csv.php");
    require_once("../../../private/logsman.php");
    
?>

<?php
    
    $page_title = "Yabe CMS Administrator Authentication";
    $style_sheets = [
        "/css/common.css",
        "/css/admin.css",
    ];
    $scripts = [
        "/js/common.js",
    ];
    
    
    /*
     *
     * YABE Database processor
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    $data = [];
    $database_name = null;
    if ($_SERVER["REQUEST_METHOD"] === "POST" && count($_POST) > 0) {
        new_logs_entry("../../../private/logs.txt", $_SERVER["SCRIPT_FILENAME"] . " | Database processor started");
        
        
        // Reconstructing data from $_POST
        foreach ($_POST as $key => $value) {
            $key_elements = explode("-", $key);
            if (preg_match("/[0-9]+/", $key_elements[0])) {
                $data[(int) $key_elements[0]][$key_elements[1]] = $value;
            } else {
                $database_name = $key_elements[1];
                $database_name = str_replace("_", ".", $database_name);
            }
        }
        
        // Writing data to database
        write_csv(PRIVATE_PATH . "/database/" . $database_name, $data, true);
        
        
        new_logs_entry("../../../private/logs.txt", $_SERVER["SCRIPT_FILENAME"] . " | Database processor finished");
    } else {
        new_logs_entry("../../../private/logs.txt", $_SERVER["SCRIPT_FILENAME"] . " | Unauthorized access");
        redirect_to(url_for("/admin"));
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
        <li><a class="content-aside-nav-active" href="<?=url_for("/admin/database_man.php");?>">Database Manager</a></li>
        <li><a href="<?=url_for("/admin/page_editor.php");?>">Page Editor</a></li>
        <li><a href="<?=url_for("/admin/about_us.php");?>">Edit About Us</a></li>
        <li><a href="<?=url_for("/admin/password.php");?>">Change password</a></li>
        <li><a href="<?=url_for("/admin/auth?q=logout");?>">Log out<i class="fas fa-sign-out-alt ml-10"></i></a></li>
      </ul>
    </aside>
        
    <section class="content-child admin-content">
      <article>
        <p class="message-success">Operation completed. <a href="<?=url_for("/admin/database_man.php");?>">Return</a></p>
      </article>
      
      <article>
        <label for="query">Logs: </label>
        <textarea rows="30" id="query">
          <?php
    
              echo "Queried data";
              print_r($_POST);
              
              echo "\nReconstructed data";
              print_r($data);
              
              echo "\nTarget database: " . $database_name;
          
          ?>
        </textarea>
      </article>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
