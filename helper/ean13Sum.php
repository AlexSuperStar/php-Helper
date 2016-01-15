<?php
// ean13Sum ean8
return function($code, $type='ean13'){
    $len = $type == 'ean13' ? 12 : 7;
    $code = substr($code, 0, $len);
    if (!preg_match('`[0-9]{'.$len.'}`', $code)) return('');
    $sum = 0;
    $odd = true;
    for($i=$len-1; $i>-1; $i--){
        $sum += ($odd ? 3 : 1) * intval($code[$i]);
        $odd = ! $odd;
    }
    return($code . ( (string) ((10 - $sum % 10) % 10)));
}?>