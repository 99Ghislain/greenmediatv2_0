<?php

if (!function_exists('formatTitle')) {
    function formatTitle($text) {
        return mb_convert_case(mb_strtolower($text, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
    }
}