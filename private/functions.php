<?php
    
    function url_for(string $script_path): string {
        // add the leading "/" if not present
        if ($script_path[0] != "/") {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path . SID;
    }
    
    function redirect_to(string $location) {
        header("Location: " . $location);
        exit;
    }
    
    function post_redirect_to(string $location, array $data): void {
        echo "<form id='post-redirect-to-action' action='" . $location . "' method='post'>";
        foreach ($data as $key => $value) {
            echo "<input type='hidden' name='" . htmlentities($key) . "' value='" . htmlentities($value) . "'>";
        }
        echo "</form>";
        
        echo "<script>";
        echo "document.getElementById('post-redirect-to-action').submit();";
        echo "</script>";
        
        echo "<noscript>Please enable Javascript for this feature to work</noscript>";
    }
    
    function display_headers(string $url): void {
        echo "<pre>";
        print_r(get_headers($url, 1));
        echo "</pre>";
    }
    
    function display_errors($errors=array()): string {
        $output = "";
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
    