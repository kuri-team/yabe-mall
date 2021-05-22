<?php
    
    class SearchResult {
        public DatabaseEntry $entry;
        public float $relevance;
        
        public function __construct(DatabaseEntry $entry, float $relevance) {
            $this->entry = $entry;
            $this->relevance = $relevance;
        }
    }
