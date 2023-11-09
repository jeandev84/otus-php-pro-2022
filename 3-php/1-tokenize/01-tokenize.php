<?php
declare(strict_types=1);

$code = <<<'CODE'
<?php 
class A {
   private int $value;
}
$a = new A();
CODE;


$tokens = \PhpToken::tokenize($code);

foreach ($tokens as $token) {
    echo "Строка {$token->line}: {$token->getTokenName()} ('{$token->text}')", PHP_EOL;
}

