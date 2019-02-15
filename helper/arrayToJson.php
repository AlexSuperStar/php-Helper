<?php
/*
  * arrayToJson
  * pear config-get php_dir
  * pear install XML_Serializer

 	Для поддержки UTF-8 тэгов нужно в файле XML/Util.php:876 доработать функцию isValidName
	строка 879
		if (!preg_match('/^[[:alpha:]_]\\z/u', mb_substr($string,0,1))) {
		# добавить модификатор u и выбор первого символа в UTF mb_substr($string,0,1) вместо string{0}
	строка 887
		$match = preg_match(
			'/^([[:alpha:]_]([[:alnum:]\-\.]*)?:)?'
			. '[[:alpha:]_]([[:alnum:]\_\-\.]+)?\\z/u',# Добавить модификатор u
			$string
		);

	To support UTF-8 tags, you need to modify the isValidName function in the XML / Util.php file: 876
	line 879
		if (!preg_match('/^[[:alpha:]_]\\z/u', mb_substr($string,0,1))) {
		# add u modifier and select first character in UTF mb_substr($string,0,1) instead of string{0}
	line 887
		$match = preg_match(
			'/^([[:alpha:]_]([[:alnum:]\-\.]*)?:)?'
			. '[[:alpha:]_]([[:alnum:]\_\-\.]+)?\\z/u',# Add u modifier
			$string
		);
 */
return function($array){
    return json_encode($array);
}?>