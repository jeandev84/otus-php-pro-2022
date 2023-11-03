<?php
declare(strict_types=1);

namespace App\Infrastructure\Http\Input;

class CreateLeadRequest
{
    private string $name;
    private string $phone;



    /**
     * @return string
    */
    public function getName(): string
    {
        return $this->name;
    }



    /**
     * @return string
    */
    public function getPhone(): string
    {
        return $this->phone;
    }
}