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
     * @return bool true if path is a csv file, false otherwise.
     */
    function is_csv(string $path): bool {
        $regex_pattern = "/\.csv$/";
        return boolval(preg_match($regex_pattern, $path));
    }
    
    
    /**
     * Read the content of a .csv (Comma-separated values) file.
     * @param string $path
     * @param bool $first_line_header
     * <em>false:</em> Default. Consider the first line as data to be read. All data will be numerically indexed.<br>
     * <em>true:</em> Consider the first line as header. Data will be associatively indexed with first line header.
     * @return array
     * <em>Nested array:</em>Read succeed.<br>
     * <em>Empty array:</em>Read failed.
     */
    function read_csv(string $path, bool $first_line_header=false): array {
        $data = [];  // Initialization
        
        if (is_csv($path)) {
            $file = fopen($path, "r");
            
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
            
            fclose($file);
        }
        
        return $data;
    }
    
    
    /**
     * Write to a .csv (Comma-separated values) file.
     * @param string $path
     * @param array $data
     * @param bool $first_line_header
     * <em>false:</em> Default. <strong>$data</strong> is numerically indexed. No header will be written on the first line.<br>
     * <em>true:</em> <strong>$data</strong> is associatively indexed with first line header. Write header on the first line.
     * @return bool
     * <em>true:</em>Write succeed.<br>
     * <em>false:</em>Write failed.
     */
    function write_csv(string $path, array $data, bool $first_line_header=false): bool {
        if (is_csv($path)) {
            $file = fopen($path, "w");
    
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
            
            fclose($file);
            return true;
        }
        
        return false;
    }
    