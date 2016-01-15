<?php
function __autoload($f)
{
    $file = $f . ".php";
    if (file_exists($file)) {
        require_once $file;
        return;
    }
}
H::bc('(($1+$2)*$3)>=6',2,2,2);

?>