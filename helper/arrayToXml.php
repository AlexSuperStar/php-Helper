<?php
/*
arrayToXml
pear config-get php_dir
pear install XML_Serializer
*/
return function ($array, $options = array(
        "indent" => "    ",
        "linebreak" => "\n",
        "typeHints" => false,
        "addDecl" => true,
        "encoding" => "UTF-8",
        "rootName" => "root",
       // "rootAttributes" => array("version" => "0.91"),
        "defaultTagName" => "item",
        "contentName" => "_content",
        "attributesArray" => "_attributes"
    )) {
    require_once "XML/Serializer.php";
    $serializer = new XML_Serializer($options);
    if ($serializer->serialize($array)) {
        return $serializer->getSerializedData();
    } else {
        return null;
    }
}?>