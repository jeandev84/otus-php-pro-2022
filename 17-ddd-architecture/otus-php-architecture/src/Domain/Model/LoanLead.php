<?php
namespace App\Domain\Model;

class LoanLead extends Lead
{
    /**
     * @inheritDoc
    */
    public function getDescription(): string
    {
        return "Заявка на кредит, клиент {$this->getName()->getValue()}";
    }

}