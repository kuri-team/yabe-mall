<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/reg-validation.php");
    require_once("../../../../private/csv.php");
    require_once("../../../../private/logsman.php");
    
?>

<?php

    $page_title = "Yabe | Register";
    $style_sheets = [
        "/css/common.css",
        "/css/account/common.css",
        "/css/account/register.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/account/common.js",
        "/js/account/register.js",
    ];
    
    
    // Automatic redirect to my-account page if user already logged in
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        redirect_to(url_for("/mall/account/my-account/"));
    }
    
    
    $place_order = false;
    if (isset($_GET["q"])) {
        // Place order logic
        if (isset($_GET["q"]) && $_GET["q"] === "place_order") {
            $place_order = true;
        }
    }
    
    
    // check if user has submitted register form
    $unique_registration_info = true;  // User submission unique validity flag
    if (isset($_POST["register"])) {
        // get all user input
        $fname = validate_form($_POST["fname"]);
        $lname = validate_form($_POST["lname"]);
        $gender = $_POST["gender"];
        $bdate = $_POST["birthdate"];
        $email = validate_form($_POST["email"]);
        $tel = validate_form($_POST["tel"]);
        $address = validate_form($_POST["address"]);
        $city = validate_form($_POST["city"]);
        $zipcode = validate_form($_POST["zipcode"]);
        $country = $_POST["country"];
        $username = validate_form($_POST["usrname"]);
        $credential = validate_form($_POST["pwd"]);
        $verify_pwd = validate_form($_POST["verify_pwd"]);
        $acc_type = validate_form($_POST["account_type"]);
        
        if ($acc_type === "store_owner") {
            $bus_name = validate_form($_POST["business_name"]);
            $store_name = validate_form($_POST["store_name"]);
            $store_category = validate_form($_POST["store_cat"]);
        } else {
            $bus_name = $store_name = $store_category = "null";
        }
    
        
        // Avatar upload logic
        $avatar_provided = $_FILES["avatar"]["error"] === UPLOAD_ERR_OK;
        if ($avatar_provided) {
            // Security feature: Get either the SHA1 or MD5 (if SHA1 is unavailable) hash from the content of the uploaded avatar image file for use as new filename
            $avatar_filename_hash = boolval(sha1_file($_FILES["avatar"]["tmp_name"])) ? sha1_file($_FILES["avatar"]["tmp_name"]) : md5_file($_FILES["avatar"]["tmp_name"]);
    
            // Get the file extension of the uploaded avatar image file
            preg_match("/\.[\w]+$/", $_FILES["avatar"]["name"], $matches);
            $avatar_filename_ext = $matches[0];
    
            // Generate new file source for avatar image
            $avatar_src = "/media/image/usr-content/" . $avatar_filename_hash . $avatar_filename_ext;
        } else {
            $avatar_src = "/media/image/usr-content/profile-placeholder_143x143.png";
        }
        
        
        // check if user input meet certain requirements
        if (
                validate_min_length($fname, 3) &&
                validate_min_length($lname, 3) &&
                validate_email($email) &&
                validate_tel($tel) &&
                validate_min_length($address, 3) &&
                validate_min_length($city, 3) &&
                validate_zipcode($zipcode) &&
                validate_pwd($credential) &&
                verify_password($credential, $verify_pwd)
        ) {
            $data = read_csv("../../../../private/database/registration.csv", true);
            if (!unique_registration($data, $email, $tel, $username)) {
                $unique_registration_info = false;
            } else {
                $id_num = count($data) + 1;    // automatically create id number
                $hashed_pwd = password_hash($credential, PASSWORD_BCRYPT);  // hash pwd for security
                
                // Default value for birthdate if user does not set it
                if ($bdate === "") {
                    $bdate = "null";
                }
    
                // Default value for country if user does not set it
                if ($country === "") {
                    $country = "null";
                }
    
                // array storing user input
                $fields = [$id_num, $fname, $lname, $gender, $bdate, $email, $tel, $address, $city, $zipcode, $country,
                    $username, $hashed_pwd, $acc_type, $bus_name, $store_name, $store_category, $avatar_src];
    
                // array storing header
                $headers = [];
                if (count($data) !== 0) {
                    foreach ($data[0] as $header => $field) {
                        $headers[] = $header;
                    }
                } else {
                    $headers = read_csv("../../../../private/database/registration.csv")[0];
                }
    
                // create an associative array associating header and user input
                $line = [];
                for ($index = 0; $index < count($headers); $index++) {
                    $line[$headers[$index]] = $fields[$index];
                }
    
                $data[] = $line;
    
                write_csv("../../../../private/database/registration.csv", $data, true);
                new_logs_entry("../../../../private/logs.txt", "User " . $line["username"] . " (" . $line["id"] . ") registered");
                if ($avatar_provided) {
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], PUBLIC_PATH . $avatar_src);
                    new_logs_entry("../../../../private/logs.txt", $_FILES["avatar"]["tmp_name"] . " moved to " . PUBLIC_PATH . $avatar_src);
                }
            }
        }
    }
    
    include(SHARED_PATH . "/top.php");

?>

<?php
    
    $piped_query = "";
    if ($place_order) {
        $piped_query = "?q=place_order";
    }
    if (isset($_POST["register"])) {
        if ($unique_registration_info) {
            echo "<div class='flex-container flex-justify-content-center'>";
            echo "<div class='submit-feedback-valid'>Successful registration. You will be redirected to the Login page in
                    <span id='redirect-countdown'><noscript>NULL - Javascript is not enabled</noscript></span> seconds.
                    Click <a href='" . url_for("/mall/account/login" . $piped_query) . "'> here</a> if it does not automatically redirect.</div>";
            echo "</div>";
            echo "<script src='" . url_for("js/account/register-redirection-countdown.js") . "'></script>";
        } else {
            echo "<div class='flex-container flex-justify-content-center'>";
            echo "<div class='submit-feedback-not-unique'>Email / phone number / username already existed. Please use a different one.</div>";
            echo "</div>";
        }
    }

?>

<main class="content-body register-body">
  <div class="content-text mt-100">

    <h1 class="text-align-center">REGISTER</h1>

    <div id="register-avatar" class="flex-container flex-justify-content-center">
      <div class="avatar-img flex-container flex-align-items-center flex-direction-column">
        <img alt="avatar" src="../../../media/image/profile-placeholder_143x143.png">
        <div class="edit-icon text-align-center"><i class="fas fa-edit"></i> Edit</div>
      </div>
    </div>

    <form id="register-form" class="register-form" action="<?=url_for("mall/account/register" . $piped_query);?>" method="post" target="_self" enctype="multipart/form-data">
      <div id="register-avatar-upload-field" class="register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item no-border register-item-photo-upload flex-container animated">
          <label><input id="avatar" name="avatar" type="file" accept=".png,.jpg,.jpeg,image/bmp,image/jpeg,image/png"></label> <span>Please upload an 1:1 image</span>
        </div>
      </div>

      <div class="mt-30"></div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center flex-align-items-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="fname">First Name</label>
          <input pattern=".{3,}" id="fname" name="fname" type="text" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
        <div class="input-field-validation register-item flex-container animated animated">
          <label class="label required" for="lname">Last Name</label>
          <input pattern=".{3,}" id="lname" name="lname" type="text" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label" for="gender">Gender</label>
          <select id="gender" name="gender">
              <option value="null" name="gender"></option>
              <option value="Male" name="gender">Male</option>
              <option value="Female" name="gender">Female</option>
              <option value="Non-binary" name="gender">Non-binary</option>
              <option value="Prefer not to say" name="gender">Prefer not to say</option>
          </select>
          <i class="fas fa-caret-down"></i>
          <span class="message-error"></span>
        </div>
        <div class="input-field-validation register-item flex-container animated">
          <label class="label" for="birthdate">Birthdate</label>
          <input id="birthdate" type="date" name="birthdate">
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="email">Email</label>
          <input id="email" name="email" type="text" pattern="^(([a-zA-Z0-9][.]?){2,}|([a-zA-Z0-9]\.)+)([a-zA-Z0-9]|(?!\.))+?[a-zA-Z0-9][@](?=[^.])[a-zA-Z0-9.]+[.][a-zA-Z]{2,5}$" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="phone">Phone Number</label>
          <input id="phone" name="tel" type="text" pattern="^([0-9][-. ]?){8,10}[0-9]$" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="address">Address</label>
          <input pattern=".{3,}" id="address" name="address" type="text" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="city">City</label>
          <input pattern=".{3,}" id="city" name="city" type="text" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
        <div class="input-field-validation register-item flex-container animated">
          <label class="label required" for="zipcode">Zipcode</label>
          <input pattern="[0-9]{4,6}" id="zipcode" name="zipcode" type="text" placeholder="This field is required" required>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label" for="country">Country</label>
          <select id="country" name="country">
            <option name="country" value=""></option>
            <?php
            
                $countries = read_csv("../../../../private/database/country.csv", true);
                foreach ($countries as $country) {
                    echo "<option name='country' value='" . $country["country_code"] . "'>" . $country["country_name"] . "</option>";
                }
                
            ?>
          </select>
          <i class="fas fa-caret-down"></i>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="usrname">Username</label>
          <input id="usrname" name="usrname" type="text" required>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label required" for="pwd">Password</label>
          <input id="pwd" class="password-field" name="pwd" type="password"
                 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$"
                 onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter a valid Password' : ''); if(this.checkValidity()) form.verify_pwd.pattern = this.value;"
                 placeholder="This field is required" required>
          <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
          <span class="message-error"></span>
        </div>
        <div class="input-field-validation register-item flex-container animated">
          <label class="label required" for="verify_pwd">Verify Password</label>
          <input id="verify_pwd" class="password-field" name="verify_pwd" type="password"
                 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$"
                 onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"
                 placeholder="This field is required" required>
          <div class="toggle-password-visibility"><i class="fas fa-eye"></i></div>
          <span class="message-error"></span>
        </div>
      </div>

      <div id="register-account-type-capture-area" class="input-field-validation register-field flex-container flex-justify-content-center flex-direction-column">
        <p class="subtitle required">Account Type</p>
        <div class="register-field flex-container flex-align-items-center flex-justify-content-center flex-justify-content-space-between">
          <div class="register-item no-border flex-container flex-align-items-center flex-justify-content-center">
            <label for="shopper">Shopper</label>
            <input type="radio" name="account_type" id="shopper" value="shopper" required checked>
            <span class="radio-control"></span>
          </div>
          <div class="register-item no-border flex-container flex-align-items-center flex-justify-content-center">
            <label for="store-owner">Store Owner</label>
            <input type="radio" name="account_type" id="store-owner" value="store_owner" required>
            <span class="radio-control"></span>
          </div>
        </div>
      </div>

      <div id="store-owner-only">
        <div class="register-field flex-container flex-align-items-center flex-justify-content-center">
          <div class="register-item flex-container animated">
            <label class="label" for="business-name">Business Name</label>
            <input type="text" name="business_name" id="business-name" value="">
          </div>
        </div>

        <div class="register-field flex-container flex-align-items-center flex-justify-content-center">
          <div class="register-item flex-container animated">
            <label class="label" for="store-name">Store Name</label>
            <input type="text" name="store_name" id="store-name" value="">
          </div>
        </div>

        <div class="register-field flex-container flex-align-items-center flex-justify-content-center">
          <div class="register-item flex-container animated">
            <label class="label" for="store-category">Store Category</label>
            <select name="store_cat" id="store-category">
              <option name="store_cat" value=""></option>
              <option name="store_cat" value="Department">Department Store</option>
              <option name="store_cat" value="Grocery">Grocery Store</option>
              <option name="store_cat" value="Restaurant">Restaurant</option>
              <option name="store_cat" value="Clothing">Clothing Store</option>
              <option name="store_cat" value="Accessory">Accessory Store</option>
              <option name="store_cat" value="Pharmacy">Pharmacy</option>
              <option name="store_cat" value="Technology">Technology Store</option>
              <option name="store_cat" value="Pet">Pet Store</option>
              <option name="store_cat" value="Toy">Toy Store</option>
              <option name="store_cat" value="Specialty">Specialty Store</option>
              <option name="store_cat" value="Thrift">Thrift Store</option>
              <option name="store_cat" value="Service">Service</option>
              <option name="store_cat" value="Kiosk">Kiosk</option>
            </select>
            <i class="fas fa-caret-down"></i>
          </div>
        </div>
      </div>
      
      <div class="register-field register-bttn-field flex-container flex-direction-column flex-align-items-center">
        <label><input type="reset" value="CLEAR"></label>
        <label><input type="submit" name="register" value="REGISTER"></label>
      </div>
    </form>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
