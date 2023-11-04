<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

/**
 * Immutable value object Name (неизменяемый)
*/
class Name
{
     private string $value;


     /**
      * @param string $value
     */
     public function __construct(string $value)
     {
         $this->assertValidName($value);
         $this->value = $value;
     }




     // охрана значения
     private function assertValidName(string $value)
     {
          if (mb_strlen($value) < 2) {
               throw new \InvalidArgumentException("Имя должно содержать минимум 3 символа");
          }
     }




    /**
     * @return string
    */
    public function getValue(): string
    {
        return $this->value;
    }
}