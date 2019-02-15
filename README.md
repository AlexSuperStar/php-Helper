# php-Helper
(PHP 5 >= 5.3.0, PHP 7)

*Read this in other languages: [English](README.en.md).*

Статический класс с автоматической подгрузкой функций


При вызове класса H::funcName проверяется, есть ли функция в директории helper
если функция найдена то она запускается, если ее там нет, то пытаемся загрузить файл из интернета или локального хранилища затем сохраняется в директорию helper и выполняется.

Адрес хранилища файлов функций указан в свойстве H:: $remouteUrl

Пример(Example)
```php
include 'H.php';
var_dump(H::bc('((($1+$2)*$3)-2)>=6',2,2,2));
var_dump(H::dirList('./')); 

```
результат(result):
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