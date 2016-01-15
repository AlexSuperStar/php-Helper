<?php
// jsonToXml
return function ($json, $options = array(
        "indent" => "    ",
        "linebreak" => "\n",
        "typeHints" => false,
        "addDecl" => true,
        "encoding" => "UTF-8",
        "rootName" => "root",
        //"rootAttributes" => array("version" => "0.91"),
        "defaultTagName" => "item",
        "contentName" => "_content",
        "attributesArray" => "_attributes"
    )) {
    require_once "XML/Serializer.php";
    $serializer = new XML_Serializer($options);
    $obj = json_decode($json);
    if ($serializer->serialize($obj)) {
        return $serializer->getSerializedData();
    } else {
        return null;
    }
}?>