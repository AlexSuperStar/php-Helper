<?php
# gen_rand_string
return function ($length, $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    mt_srand((double)microtime() * 1000000);  #инициализация
    $r = '';
    $l = strlen($chars);
    for ($i = 0; $i < $length; $i++)
    {
        $r .= substr($chars, mt_rand(0, $l - 1), 1);
    }
    return $r;
}?>
