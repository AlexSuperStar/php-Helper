<?php
//hex2dec
return function($number)
{
    $decvalues = array('0' => '0', '1' => '1', '2' => '2',
               '3' => '3', '4' => '4', '5' => '5',
               '6' => '6', '7' => '7', '8' => '8',
               '9' => '9', 'A' => '10', 'B' => '11',
               'C' => '12', 'D' => '13', 'E' => '14',
               'F' => '15');
    $decval = '0';
    $number = strrev($number);
    for($i = 0; $i < strlen($number); $i++)
    {
        $decval = bcadd(bcmul(bcpow('16',$i,0),$decvalues[$number{$i}]), $decval);
    }
    return $decval;
}?>