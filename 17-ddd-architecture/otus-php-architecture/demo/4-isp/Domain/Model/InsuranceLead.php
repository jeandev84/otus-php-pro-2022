<?php
namespace App\Domain\Model;

class InsuranceLead extends Lead
{
    /**
     * @inheritDoc
    */
    public function getDescription(): string
    {
        return "Заявка на страхование, телефон {$this->getPhone()->getValue()}";
    }

}