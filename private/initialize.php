<?php
    
    // Start a session when user access the site and a session for that user has not been started already
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    ob_start(); // output buffering is turned on
    
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
    
    require_once('functions.php');
    
    $errors = [];
