<?php

if (!function_exists('dd')) {
    function dd()
    {
        foreach (func_get_args() as $x) {
            var_dump($x);
        }
        die;
    }
}
