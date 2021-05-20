<?php
    
    /*
     * Constants
     */
    define("ALL_ENTRIES", -2);  // To be used with clear_logs_entry()
    define("LATEST_ENTRY", -1);  // To be used with clear_logs_entry()
    
    
    /*
     * Functions
     */
    
    /**
     * Write a new entry into log file
     * @param string $logs_filepath
     * @param string $content
     */
    function new_logs_entry(string $logs_filepath, string $content): void {
        $file = fopen($logs_filepath, "a");
        flock($file, LOCK_EX);
        
        $date = date("c");
        fwrite($file, "[" . $date . "sess_" . session_id() . "] " . $content . "\n");
        
        flock($file, LOCK_UN);
        fclose($file);
    }
    
    /**
     * Delete selected entry in log file
     * @param string $logs_filepath
     * @param int $index
     */
    function clear_logs_entry(string $logs_filepath, int $index): void {
        $file = null;
        switch ($index) {
            case ALL_ENTRIES:
                $file = fopen($logs_filepath, "w");
                flock($file, LOCK_EX);
                break;
            case LATEST_ENTRY:
                $lines = file($logs_filepath);
                unset($lines[count($lines) - 1]);
                $file = fopen($logs_filepath, "w");
                flock($file, LOCK_EX);
                foreach ($lines as $line) {
                    fwrite($file, $line);
                }
                break;
            default:
                $lines = file($logs_filepath);
                unset($lines[$index - 1]);
                $lines = array_values($lines);
                $file = fopen($logs_filepath, "w");
                flock($file, LOCK_EX);
                foreach ($lines as $line) {
                    fwrite($file, $line);
                }
                break;
        }
        flock($file, LOCK_UN);
        fclose($file);
    };
