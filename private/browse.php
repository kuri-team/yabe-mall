<?php

    /*
    *
    * Yabe database browsing interface library.
    * MIT License. Copyright (c) 2021 栗 KURI 栗
    *
    */

    /**
    * Retrieve store name and store, then insert them into the store card
    * @param $store_name
    * @param $store_id
    */
    function display_store($store_name, $store_id) {
        $store_href = url_for("/store/store-template/?id={$store_id}");
        echo "
            <div class='store-card'>
                <a href='$store_href'><img class='store-card-thumbnail' alt='image representation of a shop' src='../../media/image/profile-placeholder_143x143.png'></a>
                <a class='store-card-name' href=$store_href>$store_name</a>
            </div>
        ";
    }

    /**
    * Retrieve a list of stores and the maximum number of cards that will be display
    * Display store cards with a number of cards that is <= the maximum number of cards
    * The cards will be ordered ascending based on its position in the list
    * @param $stores
    * @param $max_cards
    */
    function each_page($stores, $max_cards) {
        $min = 0;
        $max = $max_cards - $min - 1;
        $page = $_GET["page"];
        $list_length = count($stores);
        $min += $max_cards * ($page-1);
        $max += $max_cards * ($page-1);
        if ($max > $list_length) {
            $max = $list_length - 1;
        }
        for ($i = $min; $i <= $max; $i++) {
            display_store($stores[$i]["store_name"],$stores[$i]["store_id"]);
        }

    }

    /**
    * Use the number of the current page to get the previous page
    * @return int
    */
    function prev_page() {
        $prev = $_GET["page"] - 1;
        // page number cannot be lower than 1
        if ($prev < 1) {
            $prev = 1;
        }
        return $prev;
    }

    /**
    * Use the number of the current page to get the next page
    * @return int
    */
    function next_page($list_length, $max_cards) {
        $next = $_GET["page"] + 1;
        // calculate the required pages for each browse option
        if ($list_length % $max_cards != 0) {    
            $max_page = floor($list_length / $max_cards) + 1;
        } else {
            $max_page = $list_length / $max_cards;
        }
        // page number cannot exceed the maximum number of pages
        if ($next > $max_page) {
            $next = $max_page;
        }
        return $next;
    }