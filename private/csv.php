<?php
    
    /*
     *
     * Yabe Comma-separated values database interface library.
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    
    
    /**
     * Check if a given **path** points to a .csv (Comma-separated values) file.
     * @param string $path
     * @return bool <strong><em>true</em></strong> if path is a csv file, <strong><em>false</em></strong> otherwise.
     */
    function is_csv(string $path): bool {
        $regex_pattern = "/\.csv$/";
        return boolval(preg_match($regex_pattern, $path));
    }
    
    
    /**
     * Read the content of a .csv (Comma-separated values) file.
     * @param string $path
     * @param bool $first_line_header
     * <strong><em>false:</em></strong> Default. Consider the first line as data to be read. All data will be numerically indexed.<br>
     * <strong><em>true:</em></strong> Consider the first line as header. Data will be associatively indexed with first line header.
     * @return array
     * <strong><em>Nested array:</em></strong> Read succeed.<br>
     * <strong><em>Empty array:</em></strong> Read failed.
     */
    function read_csv(string $path, bool $first_line_header=false): array {
        $data = [];  // Initialization
        
        if (is_csv($path)) {
            $file = fopen($path, "r");
            if ($file !== false) {
                flock($file, LOCK_SH);
    
                if (!$first_line_header) {
        
                    // $first_line_header = false
                    while (!feof($file)) {
                        $line = fgetcsv($file);
                        if (!empty($line)) {
                            $data[] = $line;
                        }
                    }
        
                } else {
        
                    // $first_line_header = true
                    $header_line = fgetcsv($file);
                    while (!feof($file)) {
                        $line = fgetcsv($file);
                        if (!empty($line)) {
                            $data_fields = [];
                            for ($index = 0; $index < count($header_line); $index++) {
                                $data_fields[$header_line[$index]] = $line[$index];
                            }
                            $data[] = $data_fields;
                        }
                    }
        
                }
    
                flock($file, LOCK_UN);
                fclose($file);
            }
        }
        
        return $data;
    }
    
    
    /**
     * Write to a .csv (Comma-separated values) file.
     * @param string $path
     * @param array $data
     * MUST be a 2-dimensional array with one of the following structures:
     * <h3>No header (numerically indexed fields)</h3>
     * <pre>
     * Array
     * (
     *     [0] => Array
     *         (
     *             [0] => field 1
     *             [1] => field 2
     *             [2] => field 3
     *             [3] => field 4
     *         )
     *     [1] => Array
     *         (
     *             [0] => field 1
     *             [1] => field 2
     *             [2] => field 3
     *             [3] => field 4
     *         )
     * )
     * </pre>
     * <h3>Including header (associatively indexed fields)</h3>
     * <pre>
     * Array
     * (
     *     [0] => Array
     *         (
     *             [header 1] => field 1
     *             [header 2] => field 2
     *             [header 3] => field 3
     *             [header 4] => field 4
     *         )
     *     [1] => Array
     *         (
     *             [header 1] => field 1
     *             [header 2] => field 2
     *             [header 3] => field 3
     *             [header 4] => field 4
     *         )
     * )
     * </pre>
     * @param bool $first_line_header
     * <strong><em>false:</em></strong> Default. <strong>$data</strong> is numerically indexed. No header will be written on the first line.<br>
     * <strong><em>true:</em></strong> <strong>$data</strong> is associatively indexed with first line header. Write header on the first line.
     * @return bool
     * <strong><em>true:</em></strong> Write succeed.<br>
     * <strong><em>false:</em></strong> Write failed.
     */
    function write_csv(string $path, array $data, bool $first_line_header=false): bool {
        if (is_csv($path)) {
            $file = fopen($path, "w");
            if ($file !== false) {
                flock($file, LOCK_EX);
    
                if (!$first_line_header) {
        
                    // $first_line_header = false
                    foreach ($data as $fields) {
                        fputcsv($file, $fields);
                    }
        
                } else {
        
                    // $first_line_header = true
                    $header_line = [];
                    foreach ($data[0] as $header => $field) {
                        $header_line[] = $header;
                    }
        
                    fputcsv($file, $header_line);
                    foreach ($data as $fields) {
                        fputcsv($file, $fields);
                    }
        
                }
    
                flock($file, LOCK_UN);
                fclose($file);
                return true;
            }
        }
        
        return false;
    }
    