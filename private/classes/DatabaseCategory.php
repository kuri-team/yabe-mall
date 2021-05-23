<?php
    
    class DatabaseCategory extends DatabaseEntry {
        private static int $count = 0;
        
        
        public function __construct(string $id, string $name) {
            parent::__construct($id, $name);
            self::$count++;
        }
    }
