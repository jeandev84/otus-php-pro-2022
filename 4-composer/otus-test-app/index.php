<?php
declare(strict_types=1);

/*
Подключение 1:
require_once __DIR__.'/Druid.php';
require_once __DIR__.'/Paladin.php';

Подключение 2:

spl_autoload_register(
    static fn (string $class) => require __DIR__."/$class.php"
);

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
*/


use Otus\TestApp\Domain\Model\Request;

$request = new Request();
