# php-Helper
(PHP 5 >= 5.3.0, PHP 7)

Static class with automatic function loading

When calling the class H :: funcName, it is checked whether there is a function in the helper directory, if the function is found, then it starts, if it is not there, then we try to download the file from the Internet or local storage and then it is saved to the helper directory and executed.

The address of the repository of function files is specified in the property H :: $ remouteUrl
Example
```php
include 'H.php';
var_dump(H::bc('((($1+$2)*$3)-2)>=6',2,2,2));
var_dump(H::dirList('./')); 

```
Result
```bash
string(1) "1"
array(8) {
  [".gitignore"]=>
  string(10) ".gitignore"
  ["example.php"]=>
  string(11) "example.php"
  ["H.php"]=>
  string(5) "H.php"
  ["helper"]=>
  string(6) "helper"
  ["README.en.md"]=>
  string(12) "README.en.md"
  ["README.md"]=>
  string(9) "README.md"
}

```

