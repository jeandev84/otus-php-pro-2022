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

