<?php require_once("../../../../private/initialize.php"); ?>

<?php

    $page_title = "HSY Shop | Contact";
    $style_sheets = [
        "/css/common.css",
        "/css/store/store.css",
        "/css/store/store-contact.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js",
    ];

    include(SHARED_PATH . "/top.php");

?>

  <main>
      <h2 class="store-content-heading text-align-center">CONTACT</h2>
      <section id="store-page-content" class="flex-container flex-wrap">
        <div id="store-contact-form">
          <form action="" method="get">
            <label><input class="contact-field" id="full_name" type="text" name="full_name"
                          placeholder="Full Name" required></label>

            <label><input class="contact-field" id="contact_email" type="email" name="contact_email"
                          placeholder="Email" required></label>

            <label><input class="contact-field" id="contact_subject" type="text" name="contact_subject"
                          placeholder="Subject" required></label>

            <label><textarea name="contact_msg" id="contact_msg" placeholder="Message" required></textarea></label>

            <input class="reset-bttn float-left" type="reset" name="reset" value="RESET">
            <input class="submit-bttn float-right" type="submit" name="submit" value="SUBMIT">
          </form>
        </div>

        <div id="store-contact-info" class="text-align-center">
          <h3>Other Contact Info</h3>
          <h4><i class="fas fa-map-marker-alt mr-10"></i>Address</h4>
          <p>702 Nguyen Van Linh, Tan Hung, District 7, HCMC</p>

          <h4><i class="fas fa-envelope mr-10"></i>Email</h4>
          <p><a href="mailto:hsyshop@gmail.com">hsyshop@gmail.com</a></p>

          <h4><i class="fas fa-phone-alt mr-10"></i>Phone Number</h4>
          <p><a href="tel:1502104308">+1 502 104 308</a></p>
        </div>
      </section>

      <section class="store-footer flex-container flex-justify-content-center
        flex-align-items-center flex-wrap">
            <div class="store-logo"><a href="<?=url_for("/store/store-template");?>">
                    <img class="circle-img" src="../../../media/image/hsy_shop/HSY_avatar.jpg" alt="Store logo"></a>
            </div>
            <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></div>
            <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/tos");?>">Term of Service</a></div>
            <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/privacy-policy");?>">
                    Privacy Policy</a></div>

            <div id="responsive-store-footer">
                <input type="checkbox" id="store-footer-icon">
                <label for="store-footer-icon" class="responsive-store-footer-title" onclick="displayDropdown()">Legal</label>
                <ul id="responsive-store-footer-dropdown">
                    <li><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></li>
                    <li><a href="<?=url_for("/mall/legal/tos");?>">Term of Service</a></li>
                    <li><a href="<?=url_for("/mall/legal/privacy-policy");?>">Privacy Policy</a></li>
                </ul>
            </div>
      </section>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>