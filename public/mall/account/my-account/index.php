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
    
    // Automatic redirect to login page if user hasn't logged in
    if (isset($_SESSION["logged_in"]) && !$_SESSION["logged_in"]) {
        redirect_to(url_for("/mall/account/login/"));
    }
    
    include(SHARED_PATH . "/top.php");

?>

<main>
  <ul class=breadcrumb>
    <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
    <li><a href="<?=url_for("mall/account/my-account");?>">My Account</a></li>
  </ul>

  <h1 class="content-title">My Account</h1>

  <div class="content-body">
    <section class="content-text grid-container my-account-content">
      <article class="my-account-box my-account-info-wrapper">
        <ul class="my-account-info">
          <li><label>Username</label><?=$_SESSION["user_data"]["username"];?></li>
          <li><label>First Name</label><?=$_SESSION["user_data"]["fname"];?></li>
          <li><label>Last Name</label><?=$_SESSION["user_data"]["lname"];?></li>
          <li><label>Gender</label><?=$_SESSION["user_data"]["gender"];?></li>
          <li><label>Birthdate</label><?=date("F j, Y", $_SESSION["user_data"]["bdate"]);?></li>
          <li><label>Email</label><?=$_SESSION["user_data"]["email"];?></li>
          <li><label>Phone Number</label><?=$_SESSION["user_data"]["tel"];?></li>
          <li><label>Address</label><?=$_SESSION["user_data"]["address"];?></li>
          <li><label>City - Zipcode</label><?=$_SESSION["user_data"]["city"];?> - <?=$_SESSION["user_data"]["zipcode"];?></li>
          <li><label>Country</label><?=get_country_name($_SESSION["user_data"]["country"]);?></li>
          <?php
          
              if ($_SESSION["user_data"]["acc_type"] === "shopper") {
                  echo "<li><label>Account Type</label>Shopper</li>";
              } else {
                  echo "<li><label>Account Type</label>Store Owner</li>";
                  echo "<li><label>Business Name</label>" . $_SESSION["user_data"]["bus_name"] . "</li>";
                  echo "<li><label>Store Name</label>" . $_SESSION["user_data"]["store_name"] . "</li>";
                  echo "<li><label>Store Category</label>" . $_SESSION["user_data"]["store_category"] . "</li>";
              }
          
          ?>
        </ul>
        <button class="my-account-info-edit-bttn">Edit</button>
      </article>

      <article class="my-account-box my-account-avatar-wrapper flex-container flex-justify-content-center flex-align-items-center">
        <img class="my-account-avatar circle-img" alt="profile picture" src="<?=$_SESSION["user_data"]["avatar_src"];?>">
      </article>

      <article class="my-account-box my-account-links-wrapper">
        <div class="my-account-links flex-container flex-direction-column flex-justify-content-space-evenly">
          <a class="active" href="">Info</a>
          <?php
      
              if ($_SESSION["user_data"]["acc_type"] === "store_owner") {
                  echo "<a href=''>Business Dashboard</a>";
              }
  
          ?>
          <a href="">My Orders</a>
          <a href="">Payment Information</a>
          <a href="">Password & Security</a>
          <a href="<?=url_for('/mall/account/login/') . '?q=logout';?>">Log Out</a>
        </div>
      </article>
    </section>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>

