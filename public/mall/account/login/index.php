<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/csv.php");
    
?>

<?php
    
    $page_title = "Yabe | Login";
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
        $data = read_csv("../../../../private/database/registration.csv", true);
        
        for ($index = 0; $index < count($data); $index++) {
            if (((isset($_POST["password"])) && $_POST["username"] === $data[$index]["email"] || $_POST["username"] === $data[$index]["tel"]) && $_POST["password"] === $data[$index]["credential"]) {
                $invalid = false;
                break;
            }
        }
        
        if (!$invalid) {
            $_SESSION["logged_in"] = true;
            header("Location: /mall/account/my-account/");
        }
    }
    // End of login logic
    
    
    // Log out logic
    if (isset($_GET["q"]) && $_GET["q"] === "logout") {
        $_SESSION["logged_in"] = false;
    }
    // End of log out logic

    
    include(SHARED_PATH . "/top.php");

?>

<main class="dialog-container">
    <form id="login-form" method="post" autocomplete="on">
        <h1>READY? GO</h1>
        <?php
        
            // If login failed, the system will display an error div
            if (isset($invalid)) {
                echo("<div class='login-invalid-credentials'>Invalid phone/email and password combination</div>");
            }
    
        ?>
        <label><input type="text" name="username" placeholder="Phone / Email" required></label>
        <label><input class="password-field" type="password" name="password" placeholder="Password" required></label>
        <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
        <input type="submit" name="act" value="LOGIN">
    </form>

    <section class="level">
        <div id="forgot-pw">
            <div>
                <a href="../forgot-password/index.php">Forgot Password?</a>
            </div>
        </div>
        <div id="create-account">
            <div>
                <a href="../register/index.php">Create an Account</a>
            </div>
        </div>
    </section>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>