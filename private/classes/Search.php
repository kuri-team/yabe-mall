<?php

    class Search {
        public const FILTER_ALL = "All";
        public const FILTER_PRODUCTS = "Products";
        public const FILTER_STORES = "Stores";
        
        public string $query;
        public string $filter;
        public array $results = [];
        
        
        public function __construct(string $query, string $filter=self::FILTER_ALL) {
            $this->query = $query;
            if ($filter === "Filter") {
                $this->filter = self::FILTER_ALL;
            } else {
                $this->filter = $filter;
            }
            
            
            switch ($this->filter) {
                case self::FILTER_ALL:
                case self::FILTER_PRODUCTS:
                    $data = new Database(Database::PRODUCT_DATABASE);
                    $this->results = $data->getEntriesByName($query);
                    break;
                case self::FILTER_STORES:
                default:
                    $data = new Database(Database::STORE_DATABASE);
                    $this->results = $data->getEntriesByName($query);
                    break;
            }
        }
    }
