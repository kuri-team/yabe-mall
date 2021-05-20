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
        foreach ($products as $product) {
            if ($product['featured_in_mall'] === "TRUE") {
                return $product;
            }
        }
        return false;
    }
    
    
    /**
     * Check if stores are featured on the Mall Home page
     * @param array $stores containing information of all stores
     * @return mixed
     * <strong><em>array</em></strong> containing information of a store if it is
     * featured on mall,
     * <strong><em>false</em></strong> otherwise.
     */
    function check_featured_mall_stores(array $stores) {
        foreach ($stores as $store) {
            if ($store['featured'] === "TRUE") {
                return $store;
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
        foreach ($products as $product) {
            if ($product['featured_in_store'] === "TRUE") {
                return $product;
            }
        }
        return false;
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
     * Get all data of the selected store
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
    