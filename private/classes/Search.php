<?php

    class Search {
        public const FILTER_ALL = "All";
        public const FILTER_PRODUCTS = "Products";
        public const FILTER_STORES = "Stores";
        
        public string $query;
        public string $filter;
        public array $results = [];
        
        private array $search_terms = [];
        private Database $data;
        
        
        public function __construct(string $query, string $filter=self::FILTER_ALL) {
            $this->query = $query;
            $search_terms = preg_split("/[\s,]+/", $this->query);
            
            if ($filter === "Filter") {
                $this->filter = self::FILTER_ALL;
            } else {
                $this->filter = $filter;
            }
            switch ($this->filter) {
                case self::FILTER_ALL:
                    $this->data = new Database(Database::PRODUCT_DATABASE);
                    $store_database = new Database(Database::STORE_DATABASE);
                    
                    $product_database_entries = $store_database->getAllEntries();
                    foreach ($product_database_entries as $product_database_entry) {
                        $product_database_entry->id = "store" . $product_database_entry->id;
                    }
                    $store_database->setAllEntries($product_database_entries);
                    
                    $this->data = Database::merge($this->data, $store_database);
                    break;
                case self::FILTER_PRODUCTS:
                    $this->data = new Database(Database::PRODUCT_DATABASE);
                    break;
                case self::FILTER_STORES:
                default:
                    $this->data = new Database(Database::STORE_DATABASE);
                    break;
            }
    
            foreach ($search_terms as $search_term) {
                $this->search_terms[] = new SearchTerm($search_term, $this->data);
            }
            
            $this->generateResults();
        }
        
        
        public function generateResults() {
            $match_results = [];
            foreach ($this->search_terms as $search_term) {
                foreach ($search_term->getAllMatches() as $match) {
                    if (isset($match_results[$match->id])) {
                        $match_results[$match->id]++;
                    } else {
                        $match_results[$match->id] = 1;
                    }
                }
            }
            
            foreach ($match_results as $match_id => $match_count) {
                if ($match_count === count($this->search_terms)) {
                    if ($this->filter === self::FILTER_ALL || $this->filter === self::FILTER_STORES || $this->filter === self::FILTER_PRODUCTS) {
                        $this->results[] = $this->data->getEntryById($match_id);
                    } elseif (levenshtein(explode(" ", $this->data->getEntryById($match_id)->category->name)[0], explode(" ", $this->filter)[2]) < 5) {  // TODO: This is a temporary workaround. Replace this with an exact match mechanism.
                        $this->results[] = $this->data->getEntryById($match_id);
                    }
                }
            }
        }
    }
