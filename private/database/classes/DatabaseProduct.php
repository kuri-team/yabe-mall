<?php
    
    class DatabaseProduct extends DatabaseEntry {
        private static int $count = 0;
        
        private int $price;
        private int $created_time;  // MUST be an Unix timestamp (number of seconds since the Unix Epoch - January 1 1970 00:00:00 GMT)
        private DatabaseStore $store;
        private bool $featured_in_mall;
        private bool $featured_in_store;
        
        
        public function __construct(
            string $id,
            string $name,
            int $price,
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
    }
