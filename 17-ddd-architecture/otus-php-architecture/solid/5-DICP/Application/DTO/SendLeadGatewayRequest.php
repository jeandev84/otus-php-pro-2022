<?php
namespace App\Application\DTO;

class SendLeadGatewayRequest
{
    private string $name;
    private string $phone;


    public function __construct(string $name, string $phone)
    {
        $this->name  = $name;
        $this->phone = $phone;
    }


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