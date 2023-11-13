# Процессор строк

Краткое описание пакета.

## Требования 

- PHP 7.4 


## Установка 

```bash 
$ composer require jeandev84/otus-composer-package
```


### Использование 

```php
$processor = new StringProcessor()
echo $processor->getLength('my string'); // 9
```