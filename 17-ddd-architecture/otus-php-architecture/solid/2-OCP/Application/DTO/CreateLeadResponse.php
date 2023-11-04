<?php
declare(strict_types=1);

namespace App\Application\DTO;


/**
 * Создание объект с несколькими состояниями
 */
class CreateLeadResponse
{
     private ?string $id = null;
     private ?string $error = null;

     private function __construct()
     {
     }



     /**
      * @param string $id
      *
      * @return static
     */
     public static function createWithId(string $id): self
     {
          $object = new self();
          $object->id = $id;
          return $object;
     }




     /**
      * @param string $error
      *
      * @return static
     */
     public static function createWithError(string $error): self
     {
         $object = new self();
         $object->error = $error;
         return $object;
     }
}