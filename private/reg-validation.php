<?php
    
    
    /**
     * Trim whitespace of user input and convert special characters to HTML entities
     * @param $input
     * user input
     * @return string <strong><em>user input</em></strong> that has been trimmed and special characters have been converted
     */
    function validate_form($input): string {
        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
    
    /**
     * Check if user input meets the minimum length requirement(s)
     * @param $value
     * user input
     * @param $min_length
     * minimum length required for the input
     * @return bool
     * <strong><em>true</em></strong> if user input passes the minimum length requirements,
     * <strong><em>false</em></strong> otherwise.
     */
    function validate_min_length($value, $min_length): bool {
        $value_string_length = strlen($value);
        
        if ($value_string_length < $min_length) {
            return false;
        } else {
            return true;
        }
    }
    
    
    /**
     * Sanitize and check user input email using regex
     * @param $email
     * @return bool <strong><em>true</em></strong> if user email passes the email requirements,
     * <strong><em>false</em></strong> otherwise.
     */
    function validate_email($email): bool {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email_regex = "/^(([a-zA-Z0-9][.]?){2,}|([a-zA-Z0-9]\.)+)([a-zA-Z0-9]|(?!\.))+?[a-zA-Z0-9][@](?=[^.])[a-zA-Z0-9.]+[.][a-zA-Z]{2,5}$/";
        return boolval(preg_match($email_regex,$email));
    }
    
    
    /**
     * Check if user phone number meets certain requirements using regex
     * @param $tel
     * user phone number
     * @return bool
     * <strong><em>true</em></strong> if user phone number meets the requirements,
     * <strong><em>false</em></strong> otherwise.
     */
    function validate_tel($tel): bool {
        $phone_regex = "/^([0-9][-. ]?){8,10}[0-9]$/";
        return boolval(preg_match($phone_regex, $tel));
    }
    
    
    /**
     * Check if user zipcode meets certain requirements using regex
     * @param $zipcode
     * @return bool
     * <strong><em>true</em></strong> if user zipcode meets the requirements,
     * <strong><em>false</em></strong> otherwise.
     */
    function validate_zipcode($zipcode): bool {
        // sanitize user input in zipcode
        $zipcode = filter_var($zipcode, FILTER_SANITIZE_NUMBER_INT);
        $zipcode_regex = "/^[0-9]{4,6}$/";
        return boolval(preg_match($zipcode_regex, $zipcode));
    }
    
    
    /**
     * Check if user password meets certain requirements using regex
     * @param $pwd
     * user password
     * @return bool
     * <strong><em>true</em></strong> if user password meets the requirements,
     * <strong><em>false</em></strong> otherwise.
     */
    function validate_pwd($pwd): bool {
        $pwd_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$/";
        return boolval(preg_match($pwd_regex, $pwd));
    }
    
    
    /**
     * Check if user retyped password matches password
     * @param $credential
     * user password
     * @param $verify_pwd
     * user retyped password
     * @return bool
     * <strong><em>true</em></strong> if user retyped password matches password,
     * <strong><em>false</em></strong> otherwise.
     */
    function verify_password($credential, $verify_pwd): bool {
        if ($credential === $verify_pwd) {
            return true;
        } else {
            return false;
        }
    }