<?php
    
    
    // Yabe Search Custom Class auto-loading
    function yabe_search_autoload($class)
    {
        if (preg_match("/\A\w+\Z/", $class)) {
            require_once(PRIVATE_PATH . "/search/classes/{$class}.php");
        }
    }
    
    spl_autoload_register("yabe_search_autoload_autoload");
