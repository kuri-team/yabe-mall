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
     * Convert and echo a given database as an editable HTML table
     * @param string $name the name of the given database. For use with form submission.
     * @param array $database MUST be a database with header. Won't work on header-less database. For empty databases, set <strong>$empty</strong> to <strong><em>true</em></strong>.
     * @param bool $empty set to <strong><em>true</em></strong> to just print out a header row (only works on empty databases). Default to <strong><em>false</em></strong>.
     */
    function print_table(string $name, array $database, $empty=false): void {
        echo "<form class='form' action='database.php' method='post' target='_self'>";
        echo "<table class='dtbm-table'>";
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
            for ($index = 0; $index < count($database); $index++) {
                echo "<tr>";
                foreach ($database[$index] as $header => $field) {
                    echo "<td><input type='text' name='" . $name . "_" . $index . "_" . $header . "' value='" . $field . "'></td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "<div class='mt-10'>";
        echo "<input name='modify_database_" . $name . "' type='submit' value='MODIFY'>";
        echo "</div>";
        echo "</form>";
    }
