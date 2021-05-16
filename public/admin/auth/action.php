<?php
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/csv.php");
    require_once("../../../private/logsman.php");
    
?>

<?php
    
    $page_title = "Yabe CMS Administrator Authentication";
    $style_sheets = [
        "/css/common.css",
        "/css/account/common.css",
        "/css/account/login.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/account/common.js",
    ];
    
    
    // Authentication logic
    if (isset($_GET["q"])) {
        if (isset($_POST["act"])) {
            $data = read_csv("../../../private/database/admin.csv", true);
            if (
                $_POST["username"] === $data[0]["username"] &&
                password_verify($_POST["password"], $data[0]["phash"])
            ) {
                $_SESSION["admin_logged_in"] = true;
                new_logs_entry("../../../private/logs.txt", "Admin credential accepted, redirecting to " . $_GET["q"]);
                http_post(url_for($_GET["q"]), $_SESSION["action_post_query"]);
                unset($_SESSION["action_post_query"]);
            } else {
                new_logs_entry("../../../private/logs.txt", "Admin credentials rejected");
                $invalid = true;
            }
        } else {
            // Save POST query to $_SESSION to be piped later
            $_SESSION["action_post_query"] = $_POST;
        }
    } else {
        redirect_to(url_for("/admin"));
    }
    $invalid = false;
    // End of authentication logic
    
    
    include(SHARED_PATH . "/top.php");

?>

<main class="dialog-container">
  <form id="login-form" action="action.php?q=<?=$_GET["q"];?>" method="post" autocomplete="on">
    <h1>ACTION REQUIRED</h1>
    <?php
   
        // If authentication failed, the system will display an error div
        if (isset($invalid) && $invalid) {
            echo("<div class='login-invalid-credentials'>Invalid credentials</div>");
        }
    ?>
    <p class="mb-20">Please enter your administrator's credentials</p>
    <label><input type="text" name="username" placeholder="Username / Phone / Email" required></label>
    <label><input class="password-field" type="password" name="password" placeholder="Password" required></label>
    <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
    <input type="submit" name="act" value="AUTHENTICATE">
  </form>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>