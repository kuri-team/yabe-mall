<?php
    
    require_once "../private/csv.php";
    
    $updated = false;
    if (isset($_POST["submit"])) {
        $admin_credentials = [
                [
                    "username" => $_POST["username"],
                    "phash" => password_hash($_POST["pwd"], PASSWORD_DEFAULT)
                ]
        ];
        
        write_csv("../private/database/admin.csv", $admin_credentials, true);
        $updated = true;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="media/image/favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/install.css">

  <script src="https://kit.fontawesome.com/492245eeb1.js" crossorigin="anonymous"></script>
  <title>Yabe | Install</title>
</head>
<body>
<header>
  <nav>
    <span><a href="mall/"><img class="nav-logo-sprite" alt="Yabe logo" src="media/vector/logo-light.svg"></a></span>
  </nav>
</header>

<?php

    if ($updated) {
        echo "<div class='install-success-msg'>Administrative credentials updated. Please delete this file (/install.php) for the application to start working with the updated credentials.</div>";
    }

?>

<main>
  <h1 class="text-align-center">INSTALL</h1>
  <section class="install-instructions">
    <p class="text-align-center">Please provide an administrative username and password for your system.</p>
    <p class="text-align-center"><strong class="message-error">IMPORTANT:</strong> Delete this file (/install.php) after submitting this form for the application to start working with your provided administrator credentials.</p>
    <p class="text-align-center"><strong class="message-error">IMPORTANT:</strong> After deleting this file, to access the Administrator's Dashboard, go to <a href="/admin"><?=$_SERVER["SERVER_NAME"] . "/admin";?></a> and enter your provided credentials.</p>
  </section>
  <section class="install-form-wrapper">
    <form class="form" action="install.php" method="post" target="_self" autocomplete="off">
      <div class="form-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="form-item flex-container animated">
          <label class="label required" for="username">Username</label>
          <input id="username" name="username" type="text" placeholder="admin" required>
        </div>
      </div>

      <div class="form-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="form-item flex-container animated">
          <label class="label required" for="pwd">Password</label>
          <input class="password-field" id="pwd" name="pwd" type="password" required>
          <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
        </div>
      </div>

      <div class="form-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="form-item flex-container animated">
          <label class="label required" for="pwd-verify">Verify Password</label>
          <input class="password-field" id="pwd-verify" name="pwd-verify" type="password" required>
          <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
        </div>
      </div>

      <div class="form-field form-bttn-field flex-container flex-direction-column flex-align-items-center">
        <label><input type="reset" value="CLEAR"></label>
        <label><input type="submit" name="submit" value="SUBMIT"></label>
      </div>
    </form>
  </section>
</main>

<footer>
  <div id="footer-copyright">
    <p>&copy;<?=date("Y");?> YABE</p>
  </div>
</footer>

<script src="js/form.js"></script>
<script src="js/install.js"></script>
</body>
</html>