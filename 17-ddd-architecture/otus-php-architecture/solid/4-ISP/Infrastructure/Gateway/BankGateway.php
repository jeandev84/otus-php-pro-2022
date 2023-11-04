<?php
declare(strict_types=1);

namespace App\Infrastructure\Gateway;

use App\Application\Contract\BankGatewayInterface;
use App\Application\DTO\SendLeadGatewayRequest;
use App\Application\DTO\SendLeadGatewayResponse;

/**
 * Подключаемся к внешнему банку
*/
class BankGateway implements BankGatewayInterface
{
      public function sendLead(SendLeadGatewayRequest $request): SendLeadGatewayResponse
      {
           sleep(2);
           $id = random_int(10_000, 99_999);
           if ($id % 10 <= 2) {
               throw new \Exception("При отправке лида возникла ошибка на стороне банка");
           }
           return new SendLeadGatewayResponse((string)$id);
      }
}