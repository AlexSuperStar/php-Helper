<?php
/**
 *checkKpp
 */
return function($kpp){
    return  preg_match('/^[0-9]{4}[0-9A-Z]{2}[0-9]{3}$/',$kpp);
}?>