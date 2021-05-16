<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/csv.php");
    
?>

<?php
    
    $page_title = "Yabe | Administrator Authentication";
    $style_sheets = [
        "/css/common.css",
        "/css/account/common.css",
        "/css/account/login.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/account/common.js",
    ];
    
    
    // Login logic
    if (isset($_POST["act"])) {
        $invalid = true;
        $data = read_csv("../../../../private/database/admin.csv", true);
        
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
            redirect_to(url_for("/mall/admin/"));
        }
    }
    // End of login logic
    
    
    // Automatic redirect to Administrator's Dashboard page if user already logged in
    if (isset($_SESSION["admin_logged_in"]) && $_SESSION["logged_in"]) {
        redirect_to(url_for("/mall/admin/"));
    }

    
    include(SHARED_PATH . "/top.php");

?>

<main class="dialog-container">
    <form id="login-form" method="post" autocomplete="on">
        <h1>ADMINISTRATOR AUTHENTICATION</h1>
        <?php
        
            // If login failed, the system will display an error div
            if (isset($invalid)) {
                echo("<div class='login-invalid-credentials'>Invalid credentials</div>");
            }
    
        ?>
        <label><input type="text" name="username" placeholder="Username / Phone / Email" required></label>
        <label><input class="password-field" type="password" name="password" placeholder="Password" required></label>
        <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
        <input type="submit" name="act" value="LOGIN">
    </form>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>