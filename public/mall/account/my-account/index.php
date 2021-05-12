<?php require_once("../../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | My Account";
$style_sheets = [
    "/css/common.css",
    "/css/account/common.css",
    "/css/account/my-account.css",
];
$scripts = [
    "/js/common.js",
    "/js/account/common.js",
    "/js/account/my-account.js",
];

include(SHARED_PATH . "/top.php");

?>

<main>
  <ul class=breadcrumb>
    <li><a href="../../">Home</a>/</li>
    <li><a href="#">My Account</a></li>
  </ul>

  <h1 class="content-title">My Account</h1>

  <div class="content-body">
    <section class="content-text grid-container my-account-content">
      <article class="my-account-box my-account-info-wrapper">
        <ul class="my-account-info">
          <li><label>Username</label>tnathu-ai</li>
          <li><label>First Name</label>Anh Thu</li>
          <li><label>Last Name</label>Tran Ngoc</li>
          <li><label>Gender</label>Female</li>
          <li><label>Birthdate</label>10/20/2002</li>
          <li><label>Email</label><span id="login-email">s3879312@rmit.edu.vn</span></li>
          <li><label>Phone Number</label>0123-456-789</li>
          <li><label>Address</label>702 Nguyen Van Linh Blvd., District 7</li>
          <li><label>City - Zipcode</label>Ho Chi Minh City 700000</li>
          <li><label>Country</label>Vietnam</li>
          <li><label>Account Type</label>Shopper</li>
        </ul>
        <button class="my-account-info-edit-bttn">Edit</button>
      </article>

      <article class="my-account-box my-account-avatar-wrapper flex-container flex-justify-content-center flex-align-items-center">
        <img class="my-account-avatar circle-img" alt="profile picture" src="../../../media/image/thu.jpg">
      </article>

      <article class="my-account-box my-account-links-wrapper">
        <div class="my-account-links flex-container flex-direction-column flex-justify-content-space-evenly">
          <a class="active" href="">Info</a>
          <a href="">My Orders</a>
          <a href="">Payment Information</a>
          <a href="">Password & Security</a>
          <a href="<?=url_for("mall/account/login");?>" onclick="logOut()">Log Out</a>
        </div>
      </article>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

