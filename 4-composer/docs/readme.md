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
При разработки приложении объязательно отправить в git чтобы версии были одиноковые у всех
Но бывает случае не отправляем в git
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



3. Composer Init
```bash 
Если разработаем свой фреймворк где type пишем: framework 
Если разработаем свой пакет где type пишем: libray 
Если разработаем проект где type пишем: project 
$ composer init
                                            
  Welcome to the Composer config generator  
                                            


This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [yao/otus-test-app]: otus/composer
Description []: 
Author [Jean-Claude <jeanyao@ymail.com>, n to skip]: 
Minimum Stability []: 
Package Type (e.g. library, project, metapackage, composer-plugin) []: project
License []:    

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no
Add PSR-4 autoload mapping? Maps namespace "Otus\Composer" to the entered relative path. [src/, n to skip]: 

{
    "name": "otus/composer",
    "type": "project",
    "autoload": {
        "psr-4": {
            "Otus\\Composer\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Jean-Claude",
            "email": "jeanyao@ymail.com"
        }
    ],
    "require": {}
}

Do you confirm generation [yes]? yes
Generating autoload files
Generated autoload files
PSR-4 autoloading configured. Use "namespace Otus\Composer;" in src/
Include the Composer autoloader with: require 'vendor/autoload.php';
```


4. Composer require packages 
```
1- Установливаем блиблотеку для работы со строками
$ composer require danielstjules/stringy
$ composer require --dev phpunit/phpunit
$ composer require --dev faker/faker

$ composer install ( доустановливает пакеты, чьи версии жётско зафиксированы в composer.lock )
$ composer install --no-dev ( доустановливаем только все пакеты, которые находиться в require для prod )
$ composer update  ( переустанавливает пакеты, обновляя их версии и обновляя composer.lock )
```


5. PHP-FIG-ORG 
```
Рекомендация: https://php-fig.org/bylaws/psr-naming-conventions/
```