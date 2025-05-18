<?php

if (! function_exists('indian_format')) {
    /**
     * Format a number in the Indian format with multiple comma separators and two decimal places.
     *
     * @param  float  $number
     * @return string
     */
    function indian_format($number)
    {
        $formatted_number = number_format($number, 2, '.', '');
        $decimal_part = substr($formatted_number, -2);
        $first_part = ',' . substr($formatted_number, 0, -3);
        $integer_part = ltrim(substr($formatted_number, 4, -2), '0');
        $result = '';
        while ($integer_part !== '') {
            if (strlen($integer_part) > 2) {
                $temp = ',' . substr($integer_part, -2);
                $integer_part = substr($integer_part, 0, -2);
            } else {
                $temp = substr($integer_part, -2);
                $integer_part = substr($integer_part, 0, -2);
            }
            $result = $temp . $result;
        }
        return $result . $first_part . '.' . $decimal_part;
    }
}
