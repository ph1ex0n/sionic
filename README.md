# Sionic
### Инструкция по запуску
- установить yii2 advanced
- скопировать репозиторий в корневой каталог
- создать в базе данных таблицы [xml](https://github.com/ph1ex0n/sionic/blob/master/db_table_xml.sql) и [xml_offers](https://github.com/ph1ex0n/sionic/blob/master/db_table_xml_offers.sql)
- разместить в каталоге @backend/web/data файлы import0_1.xml и offers0_1.xml
- запустить в консоли из корневого каталога
```sh
$ ./yii xml
$ ./yii xml-offers
```
- в консоли mysql запустить
```sh
MariaDB> UPDATE xml as x, xml_offers as o SET x.quantity_0 = o.quantity_0 where x.code=o.code
MariaDB> UPDATE xml as x, xml_offers as o SET x.price_0 = o.price_0 where x.code=o.code
```
***Демо результата смотреть [тут](http://backend.icohit.ml/xml).***
