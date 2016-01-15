<?php
return function ($dir) {
    $ret = array();
    $it = new FilesystemIterator($dir);
    foreach ($it as $fileinfo) {
        $ret[$fileinfo->getFilename()] = $fileinfo->getFilename();
    }
    return $ret;
}?>