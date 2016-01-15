<?php

class H # Helper
{
    static $func = array();
    static $remouteUrl = 'https://raw.githubusercontent.com/AlexSuperStar/php-Helper/master/helper/';

    public static function __callstatic($name, $arguments)
    {
        if (!isset(self::$func[$name])) {
            if (is_file('helper/' . $name . '.php')) {
                self::$func[$name] = include 'helper/' . $name . '.php';

            }
        }
        if (empty(self::$func[$name]) && self::$remouteUrl) {
            $data = file_get_contents(self::$remouteUrl . $name . '.php');
            if (!empty($data)) {
                # TODO checkSign
                file_put_contents('helper/' . $name . '.php', $data);
                self::$func[$name] = include 'helper/' . $name . '.php';
            } else {
                trigger_error('Remoute hrlper not loaded: ' . $name, E_USER_NOTICE);
            }
        }

        if (!empty(self::$func[$name])) {
            return call_user_func_array(self::$func[$name], $arguments);
        } else {
            trigger_error('Hrlper not found: ' . $name, E_USER_ERROR);
        }
    }
}