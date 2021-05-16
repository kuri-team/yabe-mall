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
        $date = date("c");
        fwrite($file, "[" . $date . "sess_" . session_id() . "] " . $content . "\n");
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
                break;
            case LATEST_ENTRY:
                $lines = file($logs_filepath);
                unset($lines[count($lines) - 1]);
                $file = fopen($logs_filepath, "w");
                foreach ($lines as $line) {
                    fwrite($file, $line);
                }
                break;
            default:
                $lines = file($logs_filepath);
                unset($lines[$index - 1]);
                $lines = array_values($lines);
                $file = fopen($logs_filepath, "w");
                foreach ($lines as $line) {
                    fwrite($file, $line);
                }
                break;
        }
        fclose($file);
    };
