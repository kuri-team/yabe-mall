<?php

    class DatabaseEntry {
        public string $id;
        public string $name;
        
        public function __construct(string $id, string $name) {
            $this->id = $id;
            $this->name = $name;
        }
        
        
        public function isSearchTermMatch(string $search_term, int $levenshtein_match_threshold=0): bool {
            $name_elements = preg_split("/[\s,]+/", $this->name);
            foreach ($name_elements as $name_element) {
                if (levenshtein($name_element, $search_term) <= $levenshtein_match_threshold) {
                    return true;
                }
            }
            return false;
        }
    }
