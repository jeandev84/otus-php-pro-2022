<?php
declare(strict_types=1);


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


class SpiderMan {
    public SpiderMan $real;
    public array $clones = [];
}


echo "Запускаем скрипт". PHP_EOL;
display_memory_usage();
display_divider();

echo "Создаём Человека-паука". PHP_EOL;
$spiderman = new SpiderMan();

echo "Создаём клонов Человека-паука". PHP_EOL;
for($i = 0; $i < 100_000; $i++) {
     $clone = new SpiderMan();
     $clone->real = $spiderman;
     $spiderman->clones[] = $clone;
}


xdebug_debug_zval('spiderman');
xdebug_debug_zval('clone');
display_memory_usage();
display_divider();



echo "Удаляем Человека-паука". PHP_EOL;
unset($spiderman);
echo "Удаляем последнего клонов Человека-паука";
unset($clone);

xdebug_debug_zval('spiderman');
xdebug_debug_zval('clone');
display_memory_usage();
display_divider();


echo "Собираем ссылки". PHP_EOL;
gc_collect_cycles();
echo "Собираем ссылок: ". gc_status()['collected'];
echo PHP_EOL;

display_memory_usage();
display_divider();