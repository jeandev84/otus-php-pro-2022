<?php
declare(strict_types=1);


class Duck
{
     private string $name;

     public function __construct(string $name)
     {
         $this->name = $name;
     }
}



function display_memory_usage() {
     echo '----------';
     echo PHP_EOL;
     echo 'ПАМЯТЬ: '. memory_get_usage();
     echo PHP_EOL;
}


function display_divider() {
    echo PHP_EOL;
    echo '----------';
    echo PHP_EOL;
    echo PHP_EOL;
}


echo 'Создаём Скруджа:'. PHP_EOL;
$mcDuck = new Duck("Скрудж МакДак");

xdebug_debug_zval('mcDuck');
xdebug_debug_zval('darkwingDuck');
xdebug_debug_zval('negaduck');

display_memory_usage();
display_divider();


echo 'Создаём Чёрного Плаща:'. PHP_EOL;
$darkwingDuck = new Duck("Чёрный Плащ");

xdebug_debug_zval('mcDuck');
xdebug_debug_zval('darkwingDuck');
xdebug_debug_zval('negaduck');

display_memory_usage();
display_divider();



echo 'Создаём Антиплаща (он ссылается на Чёрного Плаща):'. PHP_EOL;
$negaduck = $darkwingDuck;

xdebug_debug_zval('mcDuck');
xdebug_debug_zval('darkwingDuck');
xdebug_debug_zval('negaduck');

display_memory_usage();
display_divider();



echo 'Удаляем Чёрного Плаща:'. PHP_EOL;
unset($darkwingDuck);

xdebug_debug_zval('mcDuck');
xdebug_debug_zval('darkwingDuck');
xdebug_debug_zval('negaduck');