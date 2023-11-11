<?php
declare(strict_types=1);

namespace App\Application\Service;

use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\CreateLeadResponse;
use App\Domain\Model\Lead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;
use App\Infrastructure\Gateway\BankGateway;

class LeadService
{
       /**
        * @var BankGateway
       */
       protected BankGateway $bankGateway;


       /**
        * @param BankGateway $bankGateway
       */
       public function __construct(BankGateway $bankGateway)
       {
           $this->bankGateway = $bankGateway;
       }




       /**
        * @param CreateLeadRequest $createLeadRequest
        * @return CreateLeadResponse
       */
       public function createAndSendLead(CreateLeadRequest $createLeadRequest): CreateLeadResponse
       {
           try {
                $lead = new Lead(
                    new Name($createLeadRequest->getName()),
                    new Phone($createLeadRequest->getPhone())
                );
                $id = $this->bankGateway->sendLead($lead);
                // TODO добавить ID в лид
                // TOD Сохранить лид в БД
                return CreateLeadResponse::createWithId($id);
           } catch (\Exception $exception) {
                return CreateLeadResponse::createWithError($exception->getMessage());
           }
       }
}