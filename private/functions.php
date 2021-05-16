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
    
    function http_post(string $url, array $data): bool {
        $options = [
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
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
    