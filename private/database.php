<?php
    
    /*
     *
     * Yabe common database manipulation library
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    
    
    require_once("initialize.php");
    require_once("csv.php");
    
    
    /**
     * Get full country name from a given ISO ALPHA-2 country code. Extracted from internal database.
     * @param string $country_code
     * @return string
     */
    function get_country_name(string $country_code): string {
        $countries = read_csv(PRIVATE_PATH . "/database/country.csv", true);
        foreach ($countries as $country) {
            if ($country["country_code"] === $country_code) {
                return $country["country_name"];
            }
        }
        return "Invalid country code";
    }
    
    
    /**
     * List all the available databases
     * @return array
     */
    function list_databases(): array {
        $result = scandir(PRIVATE_PATH . "/database");
        unset($result[0]);
        unset($result[1]);
        $result = array_values($result);
        return $result;
    }
    
    
    /**
     * Convert and echo a given database as HTML table
     * @param array $database MUST be a database with header. Won't work on header-less database. For empty databases, set <strong>$empty</strong> to <strong><em>true</em></strong>.
     * @param bool $empty set to <strong><em>true</em></strong> to just print out a header row (only works on empty databases). Default to <strong><em>false</em></strong>.
     */
    function print_table(array $database, $empty=false): void {
        echo "<table>";
        if ($empty) {
            // Header row
            echo "<tr>";
            foreach ($database[0] as $header) {
                echo "<th>" . $header . "</th>";
            }
            echo "</tr>";
        } else {
            // Header row
            echo "<tr>";
            foreach ($database[0] as $header => $field) {
                echo "<th>" . $header . "</th>";
            }
            echo "</rh>";
            
            // Data rows
            foreach ($database as $entry) {
                echo "<tr>";
                foreach ($entry as $field) {
                    echo "<td>" . $field . "</td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }
