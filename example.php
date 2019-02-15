<?php
include 'H.php';
var_dump(H::bc('((($1+$2)*$3)-2)>=6',2,2,2));
var_dump(H::bc('($1*$2)*2',2,2)); 
?>