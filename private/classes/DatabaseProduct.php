<?php
    
    class DatabaseProduct extends DatabaseEntry {
        private static int $count = 0;
        
        public float $price;
        public int $created_time;  // MUST be an Unix timestamp (number of seconds since the Unix Epoch - January 1 1970 00:00:00 GMT)
        public DatabaseStore $store;
        public bool $featured_in_mall;
        public bool $featured_in_store;
        
        
        public function __construct(
            string $id,
            string $name,
            float $price,
            DatabaseStore $store,
            int $created_time=null,
            bool $featured_in_mall=false,
            bool $featured_in_store=false
        ) {
            parent::__construct($id, $name);
            $this->price = $price;
            if ($created_time === null) {
                $this->created_time = time();
            } else {
                $this->created_time = $created_time;
            }
            $this->store = $store;
            $this->featured_in_mall = $featured_in_mall;
            $this->featured_in_store = $featured_in_store;
    
            self::$count++;
        }
    
        public function isSearchTermMatch(string $search_term, int $levenshtein_match_threshold=0): bool {
            $name_elements = preg_split(Search::PREG_SPLIT_PATTERN, $this->name);
            foreach ($name_elements as $name_element) {
                if (levenshtein(strtoupper($name_element), strtoupper($search_term), 3, 3, 3) <= $levenshtein_match_threshold) {
                    return true;
                }
            }
            return $this->store->isSearchTermMatch($search_term, $levenshtein_match_threshold);
        }
    }
