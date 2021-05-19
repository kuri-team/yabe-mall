<?php
    
    
    /**
     * Compare and sort the dates created of two items (stores, products, etc.) from newest to oldest
     * @param array $item1 first item for comparison
     * @param array $item2 second item for comparison
     * @return int
     */
    function sort_by_time(array $item1, array $item2): int {
        return -(strtotime($item1["created_time"]) - strtotime($item2["created_time"]));
    }
    
    
    