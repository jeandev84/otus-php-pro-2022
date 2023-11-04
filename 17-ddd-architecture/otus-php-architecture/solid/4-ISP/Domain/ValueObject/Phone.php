<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

/**
 * Immutable value object Phone (неизменяемый)
*/
class Phone
{

    private string $value;


    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->assertValidPhone($value);
        $this->value = $value;
    }




    // охрана значения
    private function assertValidPhone(string $value)
    {
        if (! preg_match('/^\d{10}$/', $value)) {
            throw new \InvalidArgumentException("Телефон должен содержать 10 цифр");
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