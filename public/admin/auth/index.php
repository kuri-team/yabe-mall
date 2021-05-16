<?php
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/csv.php");
    
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
    
    
    // GET query logic
    if (isset($_GET["q"])) {
        // Log out logic
        if (isset($_GET["q"]) && $_GET["q"] === "logout") {
            $_SESSION["admin_logged_in"] = false;
        }
    }
    
    
    // Authentication logic
    if (isset($_POST["act"])) {
        $invalid = true;
        $data = read_csv("../../../private/database/admin.csv", true);
        
        for ($index = 0; $index < count($data); $index++) {
            if (
                $_POST["username"] === $data[$index]["username"] &&
                password_verify($_POST["password"], $data[$index]["phash"])
            ) {
                $invalid = false;
                break;
            }
        }
        
        if (!$invalid) {
            $_SESSION["admin_logged_in"] = true;
            redirect_to(url_for("/admin/"));
        }
    }
    // End of authentication logic
    
    
    // Automatic redirect to Administrator's Dashboard page if user already logged in
    if (isset($_SESSION["admin_logged_in"]) && $_SESSION["logged_in"]) {
        redirect_to(url_for("/admin/"));
    }

    
    include(SHARED_PATH . "/top.php");

?>

<main class="dialog-container">
  <form id="login-form" method="post" autocomplete="on">
    <h1>YABE CMS</h1>
    <h2 class="mb-60">Administrator's Dashboard</h2>
    <?php
   
        // If login failed, the system will display an error div
        if (isset($invalid)) {
            echo("<div class='login-invalid-credentials'>Invalid credentials</div>");
        }
    ?>
    <p class="mb-20">Please enter your administrator's credentials</p>
    <label><input type="text" name="username" placeholder="Username / Phone / Email" required></label>
    <label><input class="password-field" type="password" name="password" placeholder="Password" required></label>
    <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
    <input type="submit" name="act" value="LOGIN">
  </form>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>