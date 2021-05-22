<?php
    
    // Yabe Database Custom Class auto-loading
    function yabe_database_autoload($class) {
        if (preg_match("/\A\w+\Z/", $class)) {
            require_once(PRIVATE_PATH . "/database/classes/{$class}.php");
        }
    }
    spl_autoload_register("yabe_database_autoload");
    