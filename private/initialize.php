<?php
    
    ob_start(); // output buffering is turned on
    
    // Development mode
    $dev = true;
    
    // Assign file paths to PHP constants
    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . "/public");
    define("SHARED_PATH", PRIVATE_PATH . "/shared");
    
    // Assign the root URL to a PHP constant
    // * Do not need to include the domain
    // * Use same document root as webserver
    define("WWW_ROOT", "");
    
    require_once("functions.php");
    
    $errors = [];
    
    // install.php logic
    if (file_exists(PUBLIC_PATH . "/install.php") && !$dev) {
        redirect_to(url_for("/install.php"));
    }
