<?php
    require_once "csv.php";
    require_once "../private/database/products.csv";
    
    function check_featured_products($product_id) {
        $products = read_csv("../../../../private/database/products.csv", true);
        foreach ($products as $p) {
            if (($p['featured_in_mall'] == TRUE) && ($p['id'] == $product_id)) {
                return $p;
            }
        }
        return false;
    }
    
    function check_featured_stores($store_id) {
        $stores = read_csv("../../../../private/database/products.csv", true);
        foreach ($stores as $s) {
            if (($s['featured_in_store'] == TRUE) && ($s['id'] == $store_id)) {
                return $s;
            }
        }
        return false;
    }
    
    