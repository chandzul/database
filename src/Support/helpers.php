<?php

if ( ! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @author Taylor Otwell / Laravel
     * @param  dynamic  mixed
     * @return void
     */
    function dd() {
        array_map(
            function ($x) {
                var_dump($x);
            },
            func_get_args()
        );
        die;
    }
}

if (! function_exists('loadenv')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @author David Chan / chandzul
     * @param  string  $dir
     * @return mixed
     */
    function loadenv($dir = null)
    {
        if ($dir === null) {
            $dir = dirname(dirname(__DIR__));
        }

        try {
            $dotenv = new Dotenv\Dotenv($dir);
            $dotenv->load();
        } catch (Exception $e) {
            exit('Could not find a .env file.');
        }
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @author Taylor Otwell / Laravel
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (substr($value, 0, 1) == '"' && substr($value, -1) == '"') {
            return substr($value, 1, -1);
        }
        return $value;
    }
}