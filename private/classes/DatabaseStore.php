<?php
    
    class DatabaseStore extends DatabaseEntry {
        private static int $count = 0;
        
        public DatabaseCategory $category;
        public int $created_time;  // MUST be an Unix timestamp (number of seconds since the Unix Epoch - January 1 1970 00:00:00 GMT)
        public bool $featured;  // true if this store is featured on mall home, false otherwise  TODO: This OOP feature is not yet implemented due to time constraint. Right now it is implemented functionally in /public/mall/index.php
    
    
        public function __construct(string $id, string $name, DatabaseCategory $category, int $created_time=null, bool $featured=false) {
            parent::__construct($id, $name);
            if ($created_time === null) {
                $this->created_time = time();
            } else {
                $this->created_time = $created_time;
            }
            $this->category = $category;
            $this->featured = $featured;
            
            self::$count++;
        }
    
        public function isSearchTermMatch(string $search_term, int $levenshtein_match_threshold=0): bool {
            $name_elements = preg_split(Search::PREG_SPLIT_PATTERN, $this->name);
            foreach ($name_elements as $name_element) {
                if (levenshtein(strtoupper($name_element), strtoupper($search_term), 1, 10, 100) <= $levenshtein_match_threshold) {
                    return true;
                }
            }
            return $this->category->isSearchTermMatch($search_term, $levenshtein_match_threshold);
        }
    }
