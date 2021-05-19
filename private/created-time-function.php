<?php
    function sort_by_time($item1, $item2): int {
        return -(strtotime($item1["created_time"]) - strtotime($item2["created_time"]));
    }
    
    