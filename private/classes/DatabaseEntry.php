<?php

    class DatabaseEntry {
        public string $id;
        public string $name;
        public int $search_relevance = 0;
        
        public function __construct(string $id, string $name) {
            $this->id = $id;
            $this->name = $name;
        }
        
        
        public function isSearchTermMatch(string $search_term, int $levenshtein_match_threshold=0): bool {
            $name_elements = preg_split("/[\s,]+/", $this->name);
            foreach ($name_elements as $name_element) {
                if (levenshtein(strtoupper($name_element), strtoupper($search_term)) <= $levenshtein_match_threshold) {
                    $this->search_relevance++;
                    return true;
                }
            }
            $this->search_relevance--;
            return false;
        }
    }
