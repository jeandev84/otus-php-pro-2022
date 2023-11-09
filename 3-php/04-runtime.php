<?php
declare(strict_types=1);

echo "Hello, world!";
echo PHP_EOL;
# Вывод сколько байтов выделено пхп
# echo memory_get_usage();
echo memory_get_usage(true), " байт(a/ов)";
echo PHP_EOL;

echo "Debug";

$a = 12;
$a = '123';

function foo() {
    echo 1;
    bar();
    echo 3;
}


function bar() {
    echo 2;
}

foo();