<?php require_once('../../../../private/initialize.php'); ?>

<?php

$page_title = 'Contact';
$style_sheets = [
    "/css/common.css",
    "/css/mall-contact.css"
];
$scripts = [
    "/js/common.js",
    "/js/contact/contact.js"
];

include(SHARED_PATH . '/top.php');

?>

<main>
  <ul class="breadcrumb">
    <li><a href="../">Home</a>/</li>
    <li><a href="./">Contact Us</a></li>
  </ul>
  <h1 class="content-title">CONTACT US</h1>

  <div class="content-body">
    <form id="contact-form" class="contact-form" action="" method="get" name="contact-form">
      <label for="purpose" class="title">Contact Purpose</label>
      <select id="purpose" name="contact_purpose" class="field">
        <option value="" selected>Please select an option</option>
        <option value="order">Customer Order</option>
        <option value="price">Pricing</option>
        <option value="refund_return">Refund or Returns</option>
        <option value="account">User Account</option>
        <option value="other">Other</option>
      </select>

      <div class="flex-container flex-justify-content-space-between flex-wrap">
        <div class="name">
          <label for="fname" class="title required">First Name</label>
          <input id="fname" type="text" name="fname" class="name-field" placeholder="This field is required" required>
          <div class="error-message" id="message-fname">
            <h6>First name must contain the following:</h6>
            <p class="name-greater-3 invalid" id="fname-greater-3">First name contains <b> at least 3 </b> letters</p>
          </div>
        </div>

        <div class="name">
          <label for="lname" class="title required">Last Name</label>
          <input id="lname" type="text" name="lname" class="name-field" placeholder="This field is required" required>
          <div class="error-message" id="message-lname">
            <h6>Last name must contain the following:</h6>
            <p class="name-greater-3 invalid" id="lname-greater-3">Last name contains <b> at least 3 </b> letters</p>
          </div>
        </div>
      </div>

      <label for="email_add" class="title required">Email</label>
        <span class="requirement-text">Ex: 123@1.me or 1.2.3@domain.name or this.is.my.email@sub.sub.123.main</span>
      <input id="email_add" type="email" name="email_add" class="field" placeholder="This field is required" required>
      <div class="error-message" id="message-email">
        <h6>Email must contain the following:</h6>
        <p class="invalid" id="email-pattern"> Valid email has the form [name]@[domain] <br>
          [name] consists of letters (a to z, both lower and upper cases), digits, and dots <br>
          Two dots cannot be positioned next to each other and dots cannot be located at the beginning or at the end of [name] <br>
          The length of [name] is at least 3 <br>
          [domain] consists of letters, digits, and dots <br>
          There should be at least one dot in [domain] & [name] <br>
          Two dots cannot be positioned next to each other <br>
          Dots cannot be located at the beginning or at the end of [domain] <br>
          The part of [domain] after the last dot contains only letters and has a minimum length of 2 and a maximum length of 5 <br>
        </p>
      </div>

      <label for="phone_num" class="title required">Phone
        <span class="requirement-text">Ex: 0123456789 or 0-1-2-3.4.5 6.7-8-9 or 012.345-6789</span>
      </label>
      <input id="phone_num" type="tel" name="phone_num" class="field" placeholder="This field is required" title="Phone number should only contain contains 9 to 11 digits" required>
      <div class="error-message" id="message-phone">
        <h6>Phone number must contain the following:</h6>
        <p class="invalid" id="phone-pattern">Valid phone number contains 9 to 11 digits. <br>Space, dot, and dash can be used but cannot be positioned at the beginning or at the end or next to each other of a phone</p>
      </div>

      <p class="required">Preferred Contact Method</p>
      <div class="contact-method">
        <input type="radio" id="email" name="contact_method" value="email" checked required>
        <span class="radio-control"></span>
        <label for="email">Email</label>
      </div>

      <div class="contact-method">
        <input type="radio" id="phone" name="contact_method" value="phone">
        <span class="radio-control"></span>
        <label for="phone">Phone</label>
      </div>

      <p id="contact-day-required">Contact Days</p>
      <div id="checkbox-form" class="contact-day-checkbox flex-container flex-justify-content-space-between
                flex-align-items-center flex-wrap">
        <div class="contact-day">
          <input type="checkbox" id="mon" name="contact_day[]" value="monday">
          <span class="checkbox-control"></span>
          <label for="mon">Monday</label>
        </div>

        <div class="contact-day">
          <input type="checkbox" id="tues" name="contact_day[]" value="tuesday">
          <span class="checkbox-control"></span>
          <label for="tues">Tuesday</label>
        </div>

        <div class="contact-day">
          <input type="checkbox" id="wed" name="contact_day[]" value="wednesday">
          <span class="checkbox-control"></span>
          <label for="wed">Wednesday</label>
        </div>

        <div class="contact-day">
          <input type="checkbox" id="thur" name="contact_day[]" value="thursday">
          <span class="checkbox-control"></span>
          <label for="thur">Thursday</label>
        </div>

        <div class="contact-day">
          <input type="checkbox" id="fri" name="contact_day[]" value="friday">
          <span class="checkbox-control"></span>
          <label for="fri">Friday</label>
        </div>

        <div class="contact-day">
          <input type="checkbox" id="sat" name="contact_day[]" value="saturday">
          <span class="checkbox-control"></span>
          <label for="sat">Saturday</label>
        </div>

        <div class="contact-day">
          <input type="checkbox" id="sun" name="contact_day[]" value="sunday">
          <span class="checkbox-control"></span>
          <label for="sun">Sunday</label>
        </div>

      </div>

      <label for="message" class="title required">Message</label>
      <textarea name="message" id="message" cols="50" rows="7" required></textarea>
      <span class="requirement-text" id="remaining-letters">500 letters remaining</span>

      <div class="flex-container flex-justify-content-space-between flex-wrap">
        <input class="clear-bttn" type="reset" name="reset" value="CLEAR">
        <input class="send-bttn" type="submit" id="submit" name="submit" value="SEND">
      </div>
    </form>
  </div>
</main>

<?php include(SHARED_PATH . '/bottom.php'); ?>