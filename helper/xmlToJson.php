<?php
// xmlToJson
return function ($xml, $options = array(
        "complexType"          => "array",
        "keyAttribute"         => "_attributes",
        "attributesArray"      => "_attributes",
        //  "parseAttributes"    => true,
        "forceEnum"            =>array('item'),
        "ignoreKeys"            =>array('item')
    )) {
    require_once "XML/Unserializer.php";
    $unserializer = new XML_Unserializer($options);
    if ($unserializer->unserialize($xml)) {
        return json_encode($unserializer->getUnserializedData());
    }
    else {
        return null;
    }
}?>