<?php
    
    /*
     *
     * Yabe common string manipulation library
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    
    
    /**
     * Replace extra whitespaces with only one whitespace between words in a string
     * @param string $input
     * @return string
     */
    function remove_extra_spaces(string $input): string {
        return preg_replace("/^\s+|\s+$|\s+(?=\s)/", "", $input );
    }
