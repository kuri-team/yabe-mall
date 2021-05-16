<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/csv.php");
    require_once("../../../../private/logsman.php");
    
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
    
    
    // GET query logic
    $place_order = false;
    if (isset($_GET["q"])) {
        // Place order logic
        if (isset($_GET["q"]) && $_GET["q"] === "place_order") {
            $place_order = true;
        }
    
        // Log out logic
        if (isset($_GET["q"]) && $_GET["q"] === "logout") {
            new_logs_entry("../../../../private/logs.txt", "User " . $_SESSION["user_data"]["id"] . " logged out");
            $_SESSION["logged_in"] = false;
            unset($_SESSION["user_data"]);
        }
    }
    
    
    // Login logic
    if (isset($_POST["act"])) {
        $invalid = true;
        $data = read_csv("../../../../private/database/registration.csv", true);
        $user_data = null;
        
        for ($index = 0; $index < count($data); $index++) {
            if (
                    (
                            $_POST["username"] === $data[$index]["email"] ||
                            $_POST["username"] === $data[$index]["tel"] ||
                            $_POST["username"] === $data[$index]["username"]
                    )
                    && password_verify($_POST["password"], $data[$index]["credential"])
            ) {
                $invalid = false;
                
                // Save user data from database to $user_data variable
                $user_data = [
                    "id" => $data[$index]["id"],
                    "username" => $data[$index]["username"],
                    "fname" => $data[$index]["fname"],
                    "lname" => $data[$index]["lname"],
                    "gender" => $data[$index]["gender"],
                    "bdate" => strtotime($data[$index]["bdate"]),
                    "email" => $data[$index]["email"],
                    "tel" => $data[$index]["tel"],
                    "address" => $data[$index]["address"],
                    "city" => $data[$index]["city"],
                    "zipcode" => $data[$index]["zipcode"],
                    "country" => $data[$index]["country"],
                    "acc_type" => $data[$index]["acc_type"],
                    "bus_name" => $data[$index]["bus_name"],
                    "store_name" => $data[$index]["store_name"],
                    "store_category" => $data[$index]["store_category"],
                    "avatar_src" => $data[$index]["avatar_src"]
                ];
                
                break;
            }
        }
        
        if (!$invalid) {
            $_SESSION["logged_in"] = true;
            $_SESSION["user_data"] = $user_data;
            new_logs_entry("../../../../private/logs.txt", "User " . $_SESSION["user_data"]["id"] . " logged in");
    
            if ($place_order) {
                redirect_to(url_for("/mall/cart/"));
            } else {
                redirect_to(url_for("/mall/account/my-account/"));
            }
        } else {
            new_logs_entry("../../../../private/logs.txt", "User login credentials rejected");
        }
    }
    // End of login logic
    
    
    // Automatic redirect to my-account page if user already logged in
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        redirect_to(url_for("/mall/account/my-account/"));
    }

    
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
        <label><input type="text" name="username" placeholder="Username / Phone / Email" required></label>
        <label><input class="password-field" type="password" name="password" placeholder="Password" required></label>
        <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
        <input type="submit" name="act" value="LOGIN">
    </form>

    <section class="level">
        <div id="forgot-pw">
            <div>
                <a href="<?=url_for("/mall/account/forgot-password/");?>">Forgot Password?</a>
            </div>
        </div>
        <div id="create-account">
            <div>
                <a href="<?=url_for("/mall/account/register/");?>">Create an Account</a>
            </div>
        </div>
    </section>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>