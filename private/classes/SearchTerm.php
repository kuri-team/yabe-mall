<?php
    
    class SearchTerm {
        public const LEVENSHTEIN_MATCH_THRESHOLD = 2;
        
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
    
            usort($this->matches, function ($entry_1, $entry_2) {
                return $entry_2->created_time - $entry_1->created_time;
            });
        }
        
        public function getAllMatches(): array {
            return $this->matches;
        }
    }
