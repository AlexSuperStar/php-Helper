<?php
# php >5.5  preg_replace модификатор /e УСТАРЕВШЕЙ  
# тоесть только для старых версий в php 7 уже не работает
# H::bc('(1+2)-1');    H::bc('($1+$2)-$3','1','2','1') скобки обязательно, каждое действие в скобках кроме первого. 
# поиск скобок с цифрами и знаком до тех пор пока все не сосчитают
return function () {
    $argv = func_get_args();
    $string = str_replace(' ', '', "({$argv[0]})");
    $operations = array();
    if (strpos($string, '^') !== false) $operations[] = '\^';
    if (strpbrk($string, '*/%') !== false) $operations[] = '[\*\/\%]';
    if (strpbrk($string, '+-') !== false) $operations[] = '[\+\-]';
    if (strpbrk($string, '<>!=') !== false) $operations[] = '<|>|=|<=|==|>=|!=|<>';
    //$string = preg_replace('/\$([0-9\.]+)/e', '$argv[$1]', $string);
    $string = preg_replace_callback('/\$([0-9\.]+)/', function($m) use($argv){		
				return $argv[$m[1]];
			},$string);
    while (preg_match('/\(([^\)\(]*)\)/', $string, $match)) {
       // print_r($match);
        foreach ($operations as $operation) {
            if (preg_match("/([+-]{0,1}[0-9\.]+)($operation)([+-]{0,1}[0-9\.]+)/", $match[1], $m)) {
                switch($m[2]) {
                    case '+':  $result = bcadd($m[1], $m[3]); break;
                    case '-':  $result = bcsub($m[1], $m[3]); break;
                    case '*':  $result = bcmul($m[1], $m[3]); break;
                    case '/':  $result = bcdiv($m[1], $m[3]); break;
                    case '%':  $result = bcmod($m[1], $m[3]); break;
                    case '^':  $result = bcpow($m[1], $m[3]); break;
                    case '==':
                    case '=':  $result = bccomp($m[1], $m[3]) == 0; break;
                    case '>':  $result = bccomp($m[1], $m[3]) == 1; break;
                    case '<':  $result = bccomp($m[1], $m[3]) ==-1; break;
                    case '>=': $result = bccomp($m[1], $m[3]) >= 0; break;
                    case '<=': $result = bccomp($m[1], $m[3]) <= 0; break;
                    case '<>':
                    case '!=': $result = bccomp($m[1], $m[3]) != 0; break;
                }
                $match[1] = str_replace($m[0], $result, $match[1]);
            }
        }
        $string = str_replace($match[0], $match[1], $string);
    }
    return $string;
};?>