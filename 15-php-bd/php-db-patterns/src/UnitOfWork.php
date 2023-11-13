<?php
declare(strict_types=1);


/**
 * Created by PhpStorm at 13.11.2023
 *
 * @UnitOfWork
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @package ${NAMESPACE}
 */
class UnitOfWork
{
      public function registerNew($object) {}
      public function registerDirty($object) {}
      public function registerClean($object) {}
      public function registerDeleted($object) {}
      public function commit() {}
      public function rollback() {}
}