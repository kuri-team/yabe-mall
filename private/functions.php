<?php
    
    function url_for(string $script_path): string {
        // add the leading "/" if not present
        if($script_path[0] != "/") {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path . SID;
    }
    
    function redirect_to(string $location) {
        header("Location: " . $location);
        exit;
    }
    
    function get_country_name(string $country_code): string {
        $countries = read_csv(PRIVATE_PATH . "database/country.csv", true);
        foreach ($countries as $country) {
            if ($country["country_code"] === $country_code) {
                return $country["country_name"];
            }
        }
        return "Invalid country code";
    }
    
    function display_errors($errors=array()): string {
        $output = '';
        if(!empty($errors)) {
            $output .= "<div class=\"errors\">";
            $output .= "Please fix the following errors:";
            $output .= "<ul>";
            foreach($errors as $error) {
                $output .= "<li>" . htmlspecialchars($error) . "</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        }
        return $output;
    }
    