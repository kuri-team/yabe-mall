<?php

    class DatabaseEntry {
        public string $id;
        public string $name;
        
        
        public function __construct(string $id, string $name) {
            $this->id = $id;
            $this->name = $name;
        }
        
        
        public function isSearchTermMatch(string $search_term, int $levenshtein_match_threshold=0): bool {
            $name_elements = preg_split(Search::PREG_SPLIT_PATTERN, $this->name);
            foreach ($name_elements as $name_element) {
                if (levenshtein(strtoupper($name_element), strtoupper($search_term), 3, 3, 3) <= $levenshtein_match_threshold) {
                    return true;
                }
            }
            return false;
        }
    }
