<?php require_once("../../../../private/initialize.php"); ?>

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
   // "/js/account/login.js",
];

include(SHARED_PATH . "/top.php");

?>

<main class="dialog-container">
    <form id="login-form" method="post" autocomplete="on">
        <h1>READY? GO</h1>
        <label><input type="text" name="username" placeholder="Phone / Email" required></label>
        <label><input class="password-field" type="password" name="password" placeholder="Password" required></label>
        <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
        <div id="wrong-pwd">The password is incorrect. Please try again or reset your password.</div>
        <input type="submit" name="act" value="LOGIN">
    </form>

    <?php

    include("../../../../private/csv.php");
    $invalid = true;
    $data = read_csv("../../../../private/database/registration.csv", true);

    if (isset($_POST["act"])) {
        for ($i = 0; $i < count($data); $i++) {
            if (((isset($_POST["password"])) and $_POST["username"] == $data[$i]["email"] or $_POST["username"] == $data[$i]["tel"]) and $_POST["password"] == $data[$i]["pass"]) {
                $invalid = false;
                break;
            }
        }

        if ($invalid == true) {
          echo("<p class='wrong-password'>Invalid username/password</p>");
      } else {
          header("Location: \mall\ ");
      }
    }

    ?>

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