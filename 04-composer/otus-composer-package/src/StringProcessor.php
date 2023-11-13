<?php
declare(strict_types=1);

namespace Jeandev84\Otus\Composer\Package;


/**
 * @StringProcessor
 *
 * @author <Jean-Claude> <<jeanyao@ymail.com>>
 *
 * @version 1.0.0
 *
 * @package Jeandev84\Otus\Composer\Package
 *
 * @copyright 2020 <Jean-Claude>
 *
 * @license MIT
*/
class StringProcessor
{
      public function getLength(string $s): int
      {
          return mb_strlen($s);
      }
}