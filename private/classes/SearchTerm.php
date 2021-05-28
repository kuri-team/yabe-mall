<?php
    
    class SearchTerm {
        public const LEVENSHTEIN_MATCH_THRESHOLD = 1;
        
        private string $content;
        private array $matches = [];
        
        
        public function __construct(string $content, Database $search_data=null) {
            $this->content = $content;
            if ($search_data !== null) {
                $this->generateMatches($search_data);
            }
        }
        
        
        public function generateMatches(Database $search_data) {
            foreach ($search_data->getAllEntries() as $entry) {
                if ($entry->isSearchTermMatch($this->content, self::LEVENSHTEIN_MATCH_THRESHOLD)) {
                    $this->matches[] = $entry;
                }
            }
    
            usort($this->matches, function (DatabaseEntry $entry_1, DatabaseEntry $entry_2) {
                return $entry_2->search_relevance - $entry_1->search_relevance;
            });
        }
        
        public function getAllMatches(): array {
            return $this->matches;
        }
    }
