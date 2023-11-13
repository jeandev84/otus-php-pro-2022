<?php
namespace App\Domain\Model;

class LoanLead extends Lead
{
    /**
     * @inheritDoc
    */
    public function getDescription(): string
    {
        /* return "Заявка на кредит, клиент {$this->getName()->getValue()}"; */

        $name = $this->getName()->getValue();
        $nameLength = mb_strlen($name);
        $nameDigitsLength = mb_strlen(
            preg_replace('/\D/', '', $name)
        );

        $average = 0;
        if ($nameDigitsLength !== 0) {
            $average = $nameLength / $nameDigitsLength;
        }

        return "Заявка на кредит, клиент $name, средняя длина $average";
    }

}