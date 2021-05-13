<?php require_once("../../../../private/initialize.php"); ?>

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

include(SHARED_PATH . "/top.php");

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

    <form id="register-form" class="register-form" action="../../../../private/registration.php" method="post" target="_self" enctype="multipart/form-data">
      <div id="register-avatar-upload-field" class="register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item no-border register-item-photo-upload flex-container animated">
          <label><input id="avatar" name="avatar" type="file" accept=".png,.jpg,.jpeg,image/bmp,image/jpeg,image/png"></label>
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
            <option value="gender" name=""></option>
            <option value="male" name="gender">Male</option>
            <option value="female" name="gender">Female</option>
            <option value="pnts" name="gender">Prefer not to say</option>
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
            <option name="country" value="AF">Afghanistan</option>
            <option name="country" value="AX">Åland Islands</option>
            <option name="country" value="AL">Albania</option>
            <option name="country" value="DZ">Algeria</option>
            <option name="country" value="AS">American Samoa</option>
            <option name="country" value="AD">Andorra</option>
            <option name="country" value="AO">Angola</option>
            <option name="country" value="AI">Anguilla</option>
            <option name="country" value="AQ">Antarctica</option>
            <option name="country" value="AG">Antigua and Barbuda</option>
            <option name="country" value="AR">Argentina</option>
            <option name="country" value="AM">Armenia</option>
            <option name="country" value="AW">Aruba</option>
            <option name="country" value="AU">Australia</option>
            <option name="country" value="AT">Austria</option>
            <option name="country" value="AZ">Azerbaijan</option>
            <option name="country" value="BH">Bahrain</option>
            <option name="country" value="BS">Bahamas</option>
            <option name="country" value="BD">Bangladesh</option>
            <option name="country" value="BB">Barbados</option>
            <option name="country" value="BY">Belarus</option>
            <option name="country" value="BE">Belgium</option>
            <option name="country" value="BZ">Belize</option>
            <option name="country" value="BJ">Benin</option>
            <option name="country" value="BM">Bermuda</option>
            <option name="country" value="BT">Bhutan</option>
            <option name="country" value="BO">Bolivia, Plurinational State of</option>
            <option name="country" value="BQ">Bonaire, Sint Eustatius and Saba</option>
            <option name="country" value="BA">Bosnia and Herzegovina</option>
            <option name="country" value="BW">Botswana</option>
            <option name="country" value="BV">Bouvet Island</option>
            <option name="country" value="BR">Brazil</option>
            <option name="country" value="IO">British Indian Ocean Territory</option>
            <option name="country" value="BN">Brunei Darussalam</option>
            <option name="country" value="BG">Bulgaria</option>
            <option name="country" value="BF">Burkina Faso</option>
            <option name="country" value="BI">Burundi</option>
            <option name="country" value="KH">Cambodia</option>
            <option name="country" value="CM">Cameroon</option>
            <option name="country" value="CA">Canada</option>
            <option name="country" value="CV">Cape Verde</option>
            <option name="country" value="KY">Cayman Islands</option>
            <option name="country" value="CF">Central African Republic</option>
            <option name="country" value="TD">Chad</option>
            <option name="country" value="CL">Chile</option>
            <option name="country" value="CN">China</option>
            <option name="country" value="CX">Christmas Island</option>
            <option name="country" value="CC">Cocos (Keeling) Islands</option>
            <option name="country" value="CO">Colombia</option>
            <option name="country" value="KM">Comoros</option>
            <option name="country" value="CG">Congo</option>
            <option name="country" value="CD">Congo, the Democratic Republic of the</option>
            <option name="country" value="CK">Cook Islands</option>
            <option name="country" value="CR">Costa Rica</option>
            <option name="country" value="CI">Côte d'Ivoire</option>
            <option name="country" value="HR">Croatia</option>
            <option name="country" value="CU">Cuba</option>
            <option name="country" value="CW">Curaçao</option>
            <option name="country" value="CY">Cyprus</option>
            <option name="country" value="CZ">Czech Republic</option>
            <option name="country" value="DK">Denmark</option>
            <option name="country" value="DJ">Djibouti</option>
            <option name="country" value="DM">Dominica</option>
            <option name="country" value="DO">Dominican Republic</option>
            <option name="country" value="EC">Ecuador</option>
            <option name="country" value="EG">Egypt</option>
            <option name="country" value="EV">El Salvador</option>
            <option name="country" value="GQ">Equatorial Guinea</option>
            <option name="country" value="ER">Eritrea</option>
            <option name="country" value="EE">Estonia</option>
            <option name="country" value="ET">Ethiopia</option>
            <option name="country" value="FK">Falkland Islands (Malvinas)</option>
            <option name="country" value="FO">Faroe Islands</option>
            <option name="country" value="FJ">Fiji</option>
            <option name="country" value="FI">Finland</option>
            <option name="country" value="FR">France</option>
            <option name="country" value="GF">French Guiana</option>
            <option name="country" value="PF">French Polynesia</option>
            <option name="country" value="TF">French Southern Territories</option>
            <option name="country" value="GA">Gabon</option>
            <option name="country" value="GM">Gambia</option>
            <option name="country" value="GE">Georgia</option>
            <option name="country" value="DE">Germany</option>
            <option name="country" value="GH">Ghana</option>
            <option name="country" value="GI">Gibraltar</option>
            <option name="country" value="GR">Greece</option>
            <option name="country" value="GL">Greenland</option>
            <option name="country" value="GD">Grenada</option>
            <option name="country" value="GP">Guadeloupe</option>
            <option name="country" value="GU">Guam</option>
            <option name="country" value="GT">Guatemala</option>
            <option name="country" value="GG">Guernsey</option>
            <option name="country" value="GN">Guinea</option>
            <option name="country" value="GW">Guinea-Bissau</option>
            <option name="country" value="GY">Guyana</option>
            <option name="country" value="HT">Haiti</option>
            <option name="country" value="HM">Heard Island and McDonald Islands</option>
            <option name="country" value="VA">Holy See (Vatican City State)</option>
            <option name="country" value="HN">Honduras</option>
            <option name="country" value="HK">Hong Kong</option>
            <option name="country" value="HU">Hungary</option>
            <option name="country" value="IS">Iceland</option>
            <option name="country" value="IN">India</option>
            <option name="country" value="ID">Indonesia</option>
            <option name="country" value="IR">Iran, Islamic Republic of</option>
            <option name="country" value="IQ">Iraq</option>
            <option name="country" value="IE">Ireland</option>
            <option name="country" value="IM">Isle of Man</option>
            <option name="country" value="IL">Israel</option>
            <option name="country" value="IT">Italy</option>
            <option name="country" value="JM">Jamaica</option>
            <option name="country" value="JP">Japan</option>
            <option name="country" value="JE">Jersey</option>
            <option name="country" value="JO">Jordan</option>
            <option name="country" value="KZ">Kazakhstan</option>
            <option name="country" value="KE">Kenya</option>
            <option name="country" value="KI">Kiribati</option>
            <option name="country" value="KP">Korea, Democratic People's Republic of</option>
            <option name="country" value="KR">Korea, Republic of</option>
            <option name="country" value="KW">Kuwait</option>
            <option name="country" value="KG">Kyrgyzstan</option>
            <option name="country" value="LA">Lao People's Democratic Republic</option>
            <option name="country" value="LV">Latvia</option>
            <option name="country" value="LB">Lebanon</option>
            <option name="country" value="LS">Lesotho</option>
            <option name="country" value="LR">Liberia</option>
            <option name="country" value="LY">Libya</option>
            <option name="country" value="LI">Liechtenstein</option>
            <option name="country" value="LT">Lithuania</option>
            <option name="country" value="LU">Luxembourg</option>
            <option name="country" value="MO">Macao</option>
            <option name="country" value="MK">Macedonia, the Former Yugoslav Republic of</option>
            <option name="country" value="MG">Madagascar</option>
            <option name="country" value="MW">Malawi</option>
            <option name="country" value="MY">Malaysia</option>
            <option name="country" value="MV">Maldives</option>
            <option name="country" value="ML">Mali</option>
            <option name="country" value="MT">Malta</option>
            <option name="country" value="MH">Marshall Islands</option>
            <option name="country" value="MQ">Martinique</option>
            <option name="country" value="MR">Mauritania</option>
            <option name="country" value="MU">Mauritius</option>
            <option name="country" value="YT">Mayotte</option>
            <option name="country" value="MX">Mexico</option>
            <option name="country" value="FM">Micronesia, Federated States of</option>
            <option name="country" value="MD">Moldova, Republic of</option>
            <option name="country" value="MC">Monaco</option>
            <option name="country" value="MN">Mongolia</option>
            <option name="country" value="ME">Montenegro</option>
            <option name="country" value="MS">Montserrat</option>
            <option name="country" value="MA">Morocco</option>
            <option name="country" value="MZe">Mozambique</option>
            <option name="country" value="MM">Myanmar</option>
            <option name="country" value="NA">Namibia</option>
            <option name="country" value="NR">Nauru</option>
            <option name="country" value="NP">Nepal</option>
            <option name="country" value="NL">Netherlands</option>
            <option name="country" value="NC">New Caledonia</option>
            <option name="country" value="NZ">New Zealand</option>
            <option name="country" value="NI">Nicaragua</option>
            <option name="country" value="NE">Niger</option>
            <option name="country" value="NG">Nigeria</option>
            <option name="country" value="NU">Niue</option>
            <option name="country" value="NF">Norfolk Island</option>
            <option name="country" value="MP">Northern Mariana Islands</option>
            <option name="country" value="NO">Norway</option>
            <option name="country" value="OM">Oman</option>
            <option name="country" value="OK">Pakistan</option>
            <option name="country" value="PW">Palau</option>
            <option name="country" value="PS">Palestine, State of</option>
            <option name="country" value="PA">Panama</option>
            <option name="country" value="PG">Papua New Guinea</option>
            <option name="country" value="PY">Paraguay</option>
            <option name="country" value="PE">Peru</option>
            <option name="country" value="PH">Philippines</option>
            <option name="country" value="PN">Pitcairn</option>
            <option name="country" value="PL">Poland</option>
            <option name="country" value="PT">Portugal</option>
            <option name="country" value="PR">Puerto Rico</option>
            <option name="country" value="QA">Qatar</option>
            <option name="country" value="RE">Réunion</option>
            <option name="country" value="RO">Romania</option>
            <option name="country" value="RU">Russian Federation</option>
            <option name="country" value="RW">Rwanda</option>
            <option name="country" value="BL">Saint Barthélemy</option>
            <option name="country" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
            <option name="country" value="KN">Saint Kitts and Nevis</option>
            <option name="country" value="LC">Saint Lucia</option>
            <option name="country" value="MF">Saint Martin (French part)</option>
            <option name="country" value="PM">Saint Pierre and Miquelon</option>
            <option name="country" value="VC">Saint Vincent and the Grenadines</option>
            <option name="country" value="WS">Samoa</option>
            <option name="country" value="SM">San Marino</option>
            <option name="country" value="ST">Sao Tome and Principe</option>
            <option name="country" value="SA">Saudi Arabia</option>
            <option name="country" value="SN">Senegal</option>
            <option name="country" value="RS">Serbia</option>
            <option name="country" value="SC">Seychelles</option>
            <option name="country" value="SL">Sierra Leone</option>
            <option name="country" value="SG">Singapore</option>
            <option name="country" value="SX">Sint Maarten (Dutch part)</option>
            <option name="country" value="SK">Slovakia</option>
            <option name="country" value="SI">Slovenia</option>
            <option name="country" value="SB">Solomon Islands</option>
            <option name="country" value="SO">Somalia</option>
            <option name="country" value="ZA">South Africa</option>
            <option name="country" value="GS">South Georgia and the South Sandwich Islands</option>
            <option name="country" value="SS">South Sudan</option>
            <option name="country" value="ES">Spain</option>
            <option name="country" value="SK">Sri Lanka</option>
            <option name="country" value="SD">Sudan</option>
            <option name="country" value="SR">Suriname</option>
            <option name="country" value="SJ">Svalbard and Jan Mayen</option>
            <option name="country" value="SZ">Swaziland</option>
            <option name="country" value="SE">Sweden</option>
            <option name="country" value="CH">Switzerland</option>
            <option name="country" value="SY">Syrian Arab Republic</option>
            <option name="country" value="TW">Taiwan, Province of China</option>
            <option name="country" value="TJ">Tajikistan</option>
            <option name="country" value="TZ">Tanzania, United Republic of</option>
            <option name="country" value="TH">Thailand</option>
            <option name="country" value="TL">Timor-Leste</option>
            <option name="country" value="TG">Togo</option>
            <option name="country" value="TK">Tokelau</option>
            <option name="country" value="TO">Tonga</option>
            <option name="country" value="TT">Trinidad and Tobago</option>
            <option name="country" value="TN">Tunisia</option>
            <option name="country" value="TR">Turkey</option>
            <option name="country" value="TM>">Turkmenistan</option>
            <option name="country" value="TC">Turks and Caicos Islands</option>
            <option name="country" value="TV">Tuvalu</option>
            <option name="country" value="UG">Uganda</option>
            <option name="country" value="UA">Ukraine</option>
            <option name="country" value="AE">United Arab Emirates</option>
            <option name="country" value="GB">United Kingdom</option>
            <option name="country" value="US">United States</option>
            <option name="country" value="UM">United States Minor Outlying Islands</option>
            <option name="country" value="UY">Uruguay</option>
            <option name="country" value="UZ">Uzbekistan</option>
            <option name="country" value="VU">Vanuatu</option>
            <option name="country" value="VE">Venezuela, Bolivarian Republic of</option>
            <option name="country" value="VN">Viet Nam</option>
            <option name="country" value="VG">Virgin Islands, British</option>
            <option name="country" value="VI">Virgin Islands, U.S.</option>
            <option name="country" value="WF">Wallis and Futuna</option>
            <option name="country" value="EH">Western Sahara</option>
            <option name="country" value="YE">Yemen</option>
            <option name="country" value="ZM">Zambia</option>
            <option name="country" value="ZW">Zimbabwe</option>
          </select>
          <i class="fas fa-caret-down"></i>
          <span class="message-error"></span>
        </div>
      </div>

      <div class="input-field-validation register-field flex-container flex-align-items-center flex-justify-content-center">
        <div class="register-item flex-container animated">
          <label class="label" for="usrname">Username</label>
          <input id="usrname" name="usrname" type="text">
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
              <option name="store_cat" value="department">Department Store</option>
              <option name="store_cat" value="grocery">Grocery Store</option>
              <option name="store_cat" value="restaurant">Restaurant</option>
              <option name="store_cat" value="clothing">Clothing Store</option>
              <option name="store_cat" value="accessory">Accessory Store</option>
              <option name="store_cat" value="pharmacy">Pharmacy</option>
              <option name="store_cat" value="technology">Technology Store</option>
              <option name="store_cat" value="pet">Pet Store</option>
              <option name="store_cat" value="toy">Toy Store</option>
              <option name="store_cat" value="specialty">Specialty Store</option>
              <option name="store_cat" value="thrift">Thrift Store</option>
              <option name="store_cat" value="service">Service</option>
              <option name="store_cat" value="kiosk">Kiosk</option>
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
