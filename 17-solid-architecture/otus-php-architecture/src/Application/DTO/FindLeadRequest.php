<?php
namespace App\Application\DTO;

class FindLeadRequest
{
    private string $id;


    public function __construct(string $id)
    {
        $this->id = $id;
    }


     /**
      * @return string
     */
     public function getId(): string
     {
        return $this->id;
     }
}