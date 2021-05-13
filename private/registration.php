<?php


    function validate_email($email): bool {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_regex = "/^(([a-zA-Z0-9][.]?){2,}|([a-zA-Z0-9]\.)+)([a-zA-Z0-9]|(?!\.))+?[a-zA-Z0-9][@](?=[^.])[a-zA-Z0-9.]+[.][a-zA-Z]{2,5}$/";
        return boolval(preg_match($email_regex,$email));
    }

    function validate_length($value, $minLength): bool
    {
        $valueStrLen = strlen($value);

        if ($valueStrLen < $minLength): {
            return boolval($value);
        }


            function register_validation($data)
            {
                $data = trim($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function validate_tel($tel): bool
            {
                $phone_regex = "/^([0-9][-. ]?){8,10}[0-9]$/";
                return boolval(preg_match($phone_regex, $tel));
            }

            function validate_zipcode($zipcode): bool
            {
                // sanitize user input in zipcode
                $zipcode = filter_var($zipcode, FILTER_SANITIZE_NUMBER_INT);
                $zipcode_regex = "/^[0-9]{4,6}$/";
                return boolval(preg_match($zipcode_regex, $zipcode));
            }

            function validate_pwd($pwd): bool
            {
                $pwd_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$/";
                return boolval(preg_match($pwd_regex, $pwd));
            }