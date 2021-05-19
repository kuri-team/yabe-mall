<?php
    /**
     * Check if products are featured on the Mall Home page
     * @param array $products containing information of all products
     * @return mixed
     * <strong><em>array</em></strong> containing information of a product if it is
     * featured on mall,
     * <strong><em>false</em></strong> otherwise.
     */
    function check_featured_mall_products(array $products) {
        foreach ($products as $p_mall) {
            if ($p_mall['featured_in_mall'] === "TRUE") {
                return $p_mall;
            }
        }
        return false;
    }
    
    /**
     * Check if products are featured on Store Home page(s)
     * @param array $products containing information of all products
     * @return mixed
     * <strong><em>array</em></strong> containing information of a product if it is
     * featured on Store Home,
     * <strong><em>false</em></strong> otherwise.
     */
    function check_featured_store_products(array $products) {
        foreach ($products as $p_store) {
            if ($p_store['featured_in_store'] === "TRUE") {
                return $p_store;
            }
        }
        return false;
    }
    