<?php
    
    require_once("../../private/initialize.php");
    require_once("../../private/csv.php");
    require_once("../../private/database.php");
    require_once("../../private/logsman.php");
    
?>

<?php
    
    $page_title = "Yabe CMS Administrator's Dashboard";
    $style_sheets = [
        "/css/common.css",
        "/css/flip-card.css",
        "/css/admin.css",
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
    $team_database_path = "../../private/database/team.csv";
    $team_members = read_csv($team_database_path, true);
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Edit Bio logic
        if (isset($_POST["edit_bio"])) {
            file_put_contents($filepath, $_POST["bio-edit"], LOCK_EX);
            new_logs_entry("../../private/logs.txt", "CMS About Us Editor | modified $filepath");
        }
        
        // Edit member photo logic
        if (isset($_POST["edit_photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
            $member_index = get_entry_index_by_id($team_members, $_POST["id"]);
            new_logs_entry("../../private/logs.txt", "CMS About Us Editor | Changing photo for team member ID " . $_POST["id"]);
            
            $old_photo_src = $team_members[$member_index]["img"];
            $new_photo_src = "/media/image/team/" . $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"], PUBLIC_PATH . $new_photo_src);
            new_logs_entry("../../private/logs.txt", "CMS About Us Editor | added $new_photo_src");
            
            $team_members[$member_index]["img"] = $new_photo_src;
            new_logs_entry("../../private/logs.txt", "CMS About Us Editor | linked $new_photo_src to database");
            
            unlink(PUBLIC_PATH . $old_photo_src);
            new_logs_entry("../../private/logs.txt", "CMS About Us Editor | deleted $old_photo_src");
            new_logs_entry("../../private/logs.txt", "CMS About Us Editor | Changing photo for team member ID " . $_POST["id"]) . " complete";
        }
        
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
        <input type="submit" name="edit_bio" value="MODIFY">
      </form>

      <h1 class="page-editor-title text-align-center">Team Members</h1>
      <div class="flex-container flex-wrap flex-justify-content-space-between">
        <?php
      
            foreach ($team_members as $team_member) {
                echo "<div class='flip-card about-us-member'>
                          <div class='flip-card-inner'>
                            <div class='flip-card-front'>
                              <img alt='Portrait of a person' src='" . url_for($team_member["img"]) . "'>
                            </div>
                            <div class='flip-card-back flex-container flex-direction-column flex-align-items-center'>
                              <h2>" . $team_member["name"] . "</h2>
                              <form action='about_us.php' method='post' target='_self' enctype='multipart/form-data'>
                                <label for='change-photo'>Upload a new photo</label>
                                <input id='change-photo' class='text-align-right mt-10' type='file' name='photo' required>
                                <p>Please upload an 1:1 image for best result</p>
                                <label><input type='hidden' name='id' value='" . $team_member["id"] . "'></label>
                                <input type='submit' name='edit_photo' value='CHANGE'>
                              </form>
                            </div>
                          </div>
                        </div>";
            }
      
        ?>
      </div>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

