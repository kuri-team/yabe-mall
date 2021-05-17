<?php
    
    require_once "string.php";
    
    
    /**
     * Reformat and sanitize user input
     * @param string $input
     * user input
     * @return string user input that has been <strong><em>trimmed</em></strong>,
     * extra whitespaces replaced with only <em><strong>one</em></strong> whitespace between words,
     * and <em><strong>special characters</em></strong> have been <em><strong>converted</em></strong>
     */
    function validate_form(string $input): string {
        $input = trim($input);
        $input = remove_extra_spaces($input);
        $input = htmlspecialchars($input, ENT_SUBSTITUTE);
        return $input;
    }
    
    /**
     * Check if user input meets the minimum length requirement(s)
     * @param $value
     * user input
     * @param int $min_length
     * minimum length required for the input
     * @return bool
     * <strong><em>true</em></strong> if user input passes the minimum length requirements,
     * <strong><em>false</em></strong> otherwise.
     */
    function validate_min_length($value, int $min_length): bool {
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
    
    
    function remove_chars_tel(string $tel): string {
        return preg_replace("/-|[.]| /", "", $tel);
    }
    
    
    /**
     * Check if user email, phone number, and username are unique in the data
     * @param array $data
     * @param string $email
     * @param string $tel
     * @param string $username
     * @return bool
     * <strong><em>true</em></strong> if email, phone number, and username are unique.
     * <strong><em>false</em></strong> otherwise.
     */
    function unique_registration(array $data, string $email, string $tel, string $username): bool {
        if (count($data) !== 0) {
            foreach ($data as $data_fields) {
                $user_tel = remove_chars_tel($tel);
                $all_digit_tel = remove_chars_tel($data_fields["tel"]);
                
                if (
                    $email === $data_fields["email"] ||
                    $user_tel === $all_digit_tel ||
                    $username === $data_fields["username"]
                ) {
                   return false;
                }
            }
        }
        return true;
    }