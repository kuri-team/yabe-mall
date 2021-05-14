<?php
    
    function url_for($script_path): string {
        // add the leading "/" if not present
        if($script_path[0] != "/") {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path . SID;
    }
    
    function redirect_to($location) {
        header("Location: " . $location);
        exit;
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
    