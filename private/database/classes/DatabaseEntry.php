<?php

    class DatabaseEntry {
        private string $id;
        private string $name;
        
        public function __construct(string $id, string $name) {
            $this->id = $id;
            $this->name = $name;
        }
    }