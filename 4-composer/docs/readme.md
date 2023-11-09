### Composer 

- https://getcomposer.org/doc/
- https://stackoverflow.com/questions/21721495/how-to-deploy-correctly-when-using-composers-develop-production-switch
- https://habr.com/ru/companies/vk/articles/352122/
- https://habr.com/ru/articles/439200/
- https://habr.com/ru/articles/524916/
- https://habr.com/ru/companies/badoo/articles/473654/
- https://habr.com/ru/companies/vk/articles/346488/
- https://github.com/kefranabg/readme-md-generator


1. Введение 
```
1) Чем отличается composer install от composer update ?
- composer install : установливает новые пакеты
- composer update  : обновляет въпакеты до свежих версий

2) Чем отличается composer require от composer require --dev ?
dev: позволяет установить только пакеты, которые нужны для разработки на этапе разработке 

3) нужно ли хранить composer.lock в git ?
да или нет
```


2. SPL Autoload 
```php 
declare(strict_types=1);

# Подключение 1:
require_once __DIR__.'/Druid.php';
require_once __DIR__.'/Paladin.php';

# Подключение 2:

spl_autoload_register(
    static fn (string $class) => require __DIR__."/$class.php"
);

# Подключение 3:
require 'src/Domain/Model/Request.php';
require 'src/Infrastructure/Http/Request.php';


use Otus\TestApp\Domain\Model\Druid;
use Otus\TestApp\Domain\Model\Paladin;


$leeroy       = new Paladin();
$leeroy->name = 'Лирой Дженкинс';
$leeroy->hp   = 100_000;

$ido       = new Druid();
$ido->name = 'Идо';
$ido->hp   = 150_000;


echo "$leeroy->name $leeroy->hp". PHP_EOL;
echo "$ido->name $ido->hp". PHP_EOL;
```