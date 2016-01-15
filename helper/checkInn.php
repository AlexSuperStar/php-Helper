<?php

/**
 * Проверяет ИНН (идентификационный номер налогоплательщика) на корректность
 */

return function ($n)
{
    if (! is_scalar($n))
    {
        //triggertrigger_error('Scalar type expected, ' . gettype($n) . ' given ', E_USER_WARNING);
        return false;
    }
    $n = strval($n);
    if (! in_array(strlen($n), array(10, 12)) || ! ctype_digit($n))
    {
        return false;
    }

    if (strlen($n) == 10)
    {
        $sum = 0;
        foreach (array(2, 4, 10, 3, 5, 9, 4, 6, 8) as $i => $weight)
        {
            $sum += $weight * substr($n, $i, 1);
        }
        return $sum % 11 % 10 == substr($n, 9, 1);
    }

    #для 12 знаков:
    $sum1 = $sum2 = 0;
    foreach (array(7, 2, 4, 10, 3, 5, 9, 4, 6, 8) as $i => $weight)
    {
        $sum1 += $weight * substr($n, $i, 1);
    }
    foreach (array(3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8) as $i => $weight)
    {
        $sum2 += $weight * substr($n, $i, 1);
    }
    return ($sum1 % 11 % 10) . ($sum2 % 11 % 10) == substr($n, 10, 2);
};?>