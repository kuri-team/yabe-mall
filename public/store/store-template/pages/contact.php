<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/csv.php");
    require_once("../../../../private/dynamic-display.php");
	
?>

<?php

    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    
    no_id_redirect(count($stores));
    
    $specific_store = get_item_data($stores);
    
    $page_title = $specific_store["name"] . " | Contact";
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
      <?php require_once(SHARED_PATH . "/store/store-header.php"); ?>
      
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
    
      <?php require_once(SHARED_PATH . "/store/store-footer.php"); ?>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>