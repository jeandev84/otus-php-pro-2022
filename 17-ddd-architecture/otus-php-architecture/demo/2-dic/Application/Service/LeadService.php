<?php
declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Contract\BankGatewayInterface;
use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\CreateLeadResponse;
use App\Application\DTO\SendLeadGatewayRequest;
use App\Domain\Model\Lead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;


class LeadService
{
       /**
        * @var BankGatewayInterface
       */
       protected BankGatewayInterface $bankGateway;


       /**
        * @param BankGatewayInterface $bankGateway
       */
       public function __construct(BankGatewayInterface $bankGateway)
       {
           $this->bankGateway = $bankGateway;
       }




       /**
        * @param CreateLeadRequest $request
        * @return CreateLeadResponse
       */
       public function createAndSendLead(CreateLeadRequest $request): CreateLeadResponse
       {
           try {

               $lead = $this->createLead($request);

               $gatewayRequest = $this->createGatewayRequest($lead);

               $gatewayResponse = $this->bankGateway->sendLead($gatewayRequest);

                // TODO добавить ID в лид
                // TOD Сохранить лид в БД
                return CreateLeadResponse::createWithId($gatewayResponse->getId());

           } catch (\Exception $exception) {
                return CreateLeadResponse::createWithError($exception->getMessage());
           }
       }




    /**
     * @param CreateLeadRequest $request
     * @return Lead
     */
    private function createLead(CreateLeadRequest $request): Lead
    {
         $lead = new Lead(
             new Name($request->getName()),
             new Phone($request->getPhone())
         );

         return $lead;
    }

    /**
     * @param Lead $lead
     *
     * @return SendLeadGatewayRequest
    */
    public function createGatewayRequest(Lead $lead): SendLeadGatewayRequest
    {
        $gatewayRequest = new SendLeadGatewayRequest(
            $lead->getName()->getValue(),
            $lead->getPhone()->getValue()
        );
        return $gatewayRequest;
    }
}