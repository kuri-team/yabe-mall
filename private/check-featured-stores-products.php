<?php
    require_once "csv.php";
    require_once "../private/database/products.csv";
    
    /**
     * Check if products are featured on the Mall Home page
     * user input
     * @param int $product_id
     * id required for the input
     * <strong><em>true</em></strong> if user input has TRUE value,
     * <strong><em>false</em></strong> otherwise.
     */
    function check_featured_mall_products($mall_product_id) {
        $mall_products = read_csv("../../../../private/database/products.csv", true);
        foreach ($mall_products as $p_mall) {
            if (($p_mall['featured_in_mall'] == TRUE) && ($p_mall['id'] == $mall_product_id)) {
                return $p_mall;
            }
        }
        return false;
    }
    
    /**
     * Check if Check if featured products on the Store Home page(s)
     * user input
     * @param int $store_product_id
     * id required for the input
     * <strong><em>true</em></strong> if user input has TRUE value,
     * <strong><em>false</em></strong> otherwise.
     */
    function check_featured_store_products(int $store_product_id) {
        $store_products = read_csv("../../../../private/database/products.csv", true);
        foreach ($store_products as $p_store) {
            if (($p_store['featured_in_store'] == TRUE) && ($p_store['id'] == $store_product_id)) {
                return $p_store;
            }
        }
        return false;
    }
    
    
    
    
    
    
    
    