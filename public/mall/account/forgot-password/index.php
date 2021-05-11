<?php require_once('../../../../private/initialize.php'); ?>

<?php

$page_title = 'Forgot Password';
$style_sheets = [
    "/css/common.css",
    "/css/account/common.css",
    "/css/account/forgot-password.css",
];
$scripts = [
    "/js/common.js",
    "/js/account/common.js",
];

include(SHARED_PATH . '/top.php');

?>

<main>
  <section id="forgot-pw-section">
    <h1>FORGOT PASSWORD</h1>
    <p>Enter the email address or phone number associated with your account. We'll send you a code to reset your password.</p>
    <div>
      <form id="forgot-pw-input" method="get" action="" target="_self" name="userInfo">
        <label><input type="text" placeholder="Email / Phone number" name="q" id="email-phone-input" required></label>
        <label><input id="forgot-pw-submit" type="submit" value="Submit"></label>
      </form>
    </div>
  </section>

  <form class="dialog-container" action="" method="post">
    <h1>RESET PASSWORD</h1>
    <label><input type="text" name="" placeholder="Validation code"  autocomplete="username" required></label>
    <label><input class="password-field" type="password" name="" placeholder="New Password" autocomplete="new-password" required></label>
    <span class="toggle-password-visibility"><i class="fas fa-eye"></i></span>
    <label><input class="password-field" type="password" name="" placeholder="Retype New Password" autocomplete="verify-password" required></label>
    <span class="toggle-password-visibility"><i class="fas fa-eye"></i></span>

    <input type="submit" name="" value="CHANGE PASSWORD">

    <section class="level">
      <div>
        <a href="../login">Sign in?</a>
      </div>
      <div>
        <a href="../register">Create an account</a>
      </div>
    </section>
  </form>
</main>

<?php include(SHARED_PATH . '/bottom.php'); ?>