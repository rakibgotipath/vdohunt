<?php

use Carbon\Carbon;

function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = (int) ($min - 1) . '9';
    return random_int($min, $max);
}

function menuActive($routeName, $class = 'active')
{

    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) return $class;
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}

function getPaginate($num = 10)
{
    return $num;
}

// format database date time from utc to local
if (!function_exists('showDateTime')) {
    function showDateTime($date, $format = 'Y-m-d h:i A'): string
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        if (is_string($date)) {
            return Carbon::parse($date)->format($format);
        }
        return '--';
    }
}