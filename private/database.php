<?php
    
    /*
     *
     * Yabe common database manipulation library
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    
    
    require_once("csv.php");
    
    
    function get_country_name(string $country_code): string {
        $countries = read_csv(PRIVATE_PATH . "/database/country.csv", true);
        foreach ($countries as $country) {
            if ($country["country_code"] === $country_code) {
                return $country["country_name"];
            }
        }
        return "Invalid country code";
    }
