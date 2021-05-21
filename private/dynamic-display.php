<?php
    
    
    /**
     * Check if products are featured on the Mall Home page
     * @param array $products containing information of all products
     * @return array <strong><em>array</em></strong> containing information
     * of all products featured on Mall Home
     */
    function check_featured_mall_products(array $products): array {
        $featured_mall_products = [];
        
        foreach ($products as $product) {
            if ($product['featured_in_mall'] === "TRUE") {
                $featured_mall_products[] = $product;
            }
        }
        return $featured_mall_products;
    }
    
    
    /**
     * Check if stores are featured on the Mall Home page
     * @param array $stores containing information of all stores
     * @return array <strong><em>array</em></strong> containing information
     * of all stores featured on Mall Home
     */
    function check_featured_mall_stores(array $stores): array {
        $featured_mall_stores = [];
        
        foreach ($stores as $store) {
            if ($store['featured'] === "TRUE") {
                $featured_mall_stores[] = $store;
            }
        }
        return $featured_mall_stores;
    }
    
    
    /**
     * Check if products are featured on Store Home page
     * @param array $products containing information of all products
     * @return array <strong><em>array</em></strong> containing information
     * of all products featured on Store Home
     */
    function check_featured_store_products(array $products): array {
        $featured_store_products = [];
        
        foreach ($products as $product) {
            if ($product['featured_in_store'] === "TRUE") {
                $featured_store_products[] = $product;
            }
        }
        return $featured_store_products;
    }
    
    
    /**
     * Compare the dates created of two items (stores, products, etc.). To be used as the handler function for usort() to sort a given group of database items from newest to oldest.
     * @param array $item1 first item for comparison
     * @param array $item2 second item for comparison
     * @return int
     */
    function compare_by_time(array $item1, array $item2): int {
        return -(strtotime($item1["created_time"]) - strtotime($item2["created_time"]));
    }
    
    
    /**
     * Get all data of a specific store
     * @param array $stores containing data of all stores
     * @return false|mixed
     * <strong><em>array</em></strong> containing data of the selected store,
     * <strong><em>false</em></strong> otherwise.
     */
    function get_store_data(array $stores)
    {
        if (isset($_GET["id"])) {
            foreach ($stores as $store) {
                if ($_GET["id"] === $store["id"]) {
                    return $store;
                }
            }
        }
        return false;
    }
    
    
    /**
     * Get the category name from the category id of a store
     * @param string $store_category_id
     * @param array $categories containing data of all categories
     * @return false|mixed
     * <strong><em>category name</em></strong> of the selected store,
     * <strong><em>false</em></strong> otherwise.
     */
    function get_store_cat(string $store_category_id, array $categories) {
        foreach ($categories as $category) {
            if ($category["id"] === $store_category_id) {
                return $category["name"];
            }
        }
        return false;
    }
    
    
    /**
     * Get all products from a specific store
     * @param array $products containing products from database
     * @param array $store containing data of a specific store
     * @return array
     * <strong><em>array</em></strong> containing data of all products of the selected store
     */
    function get_specific_store_products(array $products, array $store): array {
        $specific_store_products = [];
        
        foreach ($products as $product) {
            if ($product["store_id"] === $store["id"]) {
                $specific_store_products[] = $product;
            }
        }
        return $specific_store_products;
    }
    