<?php
declare(strict_types=1);

namespace Otus\Composer\Service;

use Stringy\Stringy;

class MainService
{
      public function foo() {
           echo Stringy::create('foo bar')->collapseWhitespace()->swapCase();
      }
}