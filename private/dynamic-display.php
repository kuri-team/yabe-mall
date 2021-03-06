<?php
    
    
    /**
     * Redirect page to Mall Home if there is no GET id, or GET id is bigger
     * than the number of items or smaller than 1
     * @param $num_items
     * the number of items
     */
    function no_id_redirect($num_items) {
        $min_item = 1;
        
        if (!isset($_GET) || !isset($_GET["id"]) || $_GET["id"] > $num_items || $_GET["id"] < $min_item) {
            redirect_to(url_for("/404"));
        }
    }
    
    
    /**
     * Check if products are featured on the Mall Home page
     * @param array $products containing information of all products
     * @return array <strong><em>array</em></strong> containing information
     * of all products featured on Mall Home
     */
    function check_featured_mall_products(array $products): array {
        $featured_mall_products = [];
        
        foreach ($products as $product) {
            if ($product["featured_in_mall"] === "TRUE") {
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
            if ($store["featured"] === "TRUE") {
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
            if ($product["featured_in_store"] === "TRUE") {
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
     * Get all data of a specific item if the id of that item is retrieved through the link
     * @param array $items containing data of all items (stores, products, etc.)
     * @return false|mixed
     * <strong><em>array</em></strong> containing data of the selected item,
     * <strong><em>false</em></strong> otherwise.
     */
    function get_item_data(array $items) {
        if (isset($_GET["id"])) {
            foreach ($items as $item) {
                if ($_GET["id"] === $item["id"]) {
                    return $item;
                }
            }
        }
        return false;
    }
    
    
    /**
     * Get all information of a specific item if the id of that item is
     * <strong><em>not</em></strong> retrieved through the link.
     * This function is used when we have an item's id from another item's database
     * (e.g: store_id from products.csv), to get other data related to that item
     * (e.g: need to get store name)
     * @param string $item_id
     * @param array $items containing information of all items (stores, products, etc.)
     * @return false|mixed
     * <strong><em>array</em></strong> containing information of the selected item,
     * <strong><em>false</em></strong> otherwise.
     */
    function get_item_info(string $item_id, array $items) {
        foreach ($items as $item) {
            if ($item["id"] === $item_id) {
                return $item;
            }
        }
        return false;
    }
    
    
    /**
     * Get products from a specific store
     * @param array $products containing products from database
     * @param array $store containing data of a specific store
     * @return array
     * <strong><em>array</em></strong> containing data of products of the selected store
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

    
    /**
     * Get the store name that correspond to the store id on products.csv
     * @param int $id
     * @param array $stores
     * @return string
     * <strong><em>array</em></strong> containing name of the store if store_id on products.csv
     * matches id on stores.csv,
     * <strong><em>false</em></strong> otherwise.
     */
    function get_store_name(int $id, array $stores): string {
        foreach ($stores as $store) {
            if ((int) $store["id"] === $id) {
                return $store["name"];
            }
        }
        return false;
    }
    