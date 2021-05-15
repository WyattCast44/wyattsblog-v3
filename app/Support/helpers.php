<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

if(!function_exists('flash')) {

    /**
     * Flash a message to the session
     * @param string $key
     * @param string $type (success, error, info)
     * @param string $message
     */
    function flash($key, $type, $message): void
    {
        Session::flash($key, array_merge((array) session($key), [
            'type' => (string) $type,
            'message' => (string) $message
        ]));
    }

}

if(!function_exists('carbon')) {

    /**
     * Parse the given value using carbon
     * @param mixed $value
     */
    function carbon($value)
    {
        return Carbon::parse($value);
    }

}
