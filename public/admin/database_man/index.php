<?php
    
    /*
     *
     * YABE Database processor
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/csv.php");
    require_once("../../../private/logsman.php");
    
    if (count($_POST) > 0) {
        new_logs_entry("../../../private/logs.txt", "GREAT!");
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } else {
        new_logs_entry("../../../private/logs.txt", $_SERVER["SCRIPT_FILENAME"] . " | Unauthorized access");
        redirect_to(url_for("/admin"));
    }
