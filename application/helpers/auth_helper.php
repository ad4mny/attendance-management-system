<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('hashin')) {
    function hashin($key)
    {
        $data = base64_encode(base64_encode($key));
        return str_replace(['+', '/', '='], ['-', '_', ''], $data);
    }
}

if (!function_exists('hashout')) {
    function hashout($key)
    {
        $data = str_replace(['+', '/', '='], ['-', '_', ''], $key);
        return base64_decode(base64_decode($data));
    }
}
