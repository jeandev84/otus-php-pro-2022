<?php
declare(strict_types=1);


function sum(int $n): int {
    $result = 0;
    for ($i = 0; $i <= $n; $i++) {
        $result += $i;
    }
    return $result;
}

echo sum(10);


