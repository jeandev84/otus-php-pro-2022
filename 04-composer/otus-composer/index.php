<?php

declare(strict_types=1);


require_once __DIR__.'/vendor/autoload.php';

$service = new \Otus\Composer\Service\MainService();
$service->foo();


$s = new \JeanDev\OtusComposerPackage\StringProcessor();
echo $s->getLength('test');