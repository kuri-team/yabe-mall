<?php
    
    /*
     *
     * Yabe common string manipulation library
     * MIT License. Copyright (c) 2021 栗 KURI 栗
     *
     */
    
    
    /**
     * Docstring Documentation Here!
     * @param string $input
     * @return string
     */
    function beautify_string(string $input): string {
        // Remove extra spaces after a word
        $remove_extra_space_regex = preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $input);
        return $remove_extra_space_regex;
    }
