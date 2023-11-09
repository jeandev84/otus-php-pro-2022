<?php
declare(strict_types=1);

namespace Otus\TestApp\Infrastructure\Ampq;

use Otus\TestApp\Infrastructure\Http\Request;
use Otus\TestApp\Domain\Model\Request as DomainRequest;

class Consumer
{

    public function __construct()
    {
        $request = new Request();
    }
}