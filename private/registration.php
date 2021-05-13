<?php
    
    function validate_tel($tel): bool {
        $phone_regex = "/^([0-9][-. ]?){8,10}[0-9]$/";
        return boolval(preg_match($phone_regex,$tel));
    }
    
    function validate_zipcode($zipcode): bool {
        // sanitize user input in zipcode
        $zipcode = filter_var($zipcode, FILTER_SANITIZE_NUMBER_INT);
        $zipcode_regex = "/^[0-9]{4,6}$/";
        return boolval(preg_match($zipcode_regex,$zipcode));
    }
