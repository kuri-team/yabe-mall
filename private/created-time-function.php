<?php
    function cmp_created_time($product1, $product2) {
        return strtotime($product1["created_time"]) - strtotime($product2["created_time"]);
    }
    
    