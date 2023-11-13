<?php

declare(strict_types=1);

function foo() {
    bar(12);
}


function bar(int $a) {
    if($a > 10) {
        echo $a;
    }
    return;
}


foo();