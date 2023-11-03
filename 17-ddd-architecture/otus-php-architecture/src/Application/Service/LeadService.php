<?php
declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Contract\BankGatewayInterface;
use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\CreateLeadResponse;
use App\Application\DTO\FindLeadRequest;
use App\Application\DTO\FindLeadResponse;
use App\Application\DTO\SendLeadGatewayRequest;
use App\Domain\Contract\LeadRepositoryInterface;
use App\Domain\Model\Lead;
use App\Domain\Model\LoanLead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;


class LeadService
{
       /**
        * @var BankGatewayInterface
       */
       private BankGatewayInterface $bankGateway;


       /**
        * @var LeadRepositoryInterface
       */
       private LeadRepositoryInterface $leadRepository;



       /**
         * @param BankGatewayInterface $bankGateway
        *
         * @param LeadRepositoryInterface $leadRepository
       */
       public function __construct(
           BankGatewayInterface $bankGateway,
           LeadRepositoryInterface $leadRepository
       )
       {
           $this->bankGateway = $bankGateway;
           $this->leadRepository = $leadRepository;
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
        * @param FindLeadRequest $request
        *
        * @return FindLeadResponse
       */
       public function findLead(FindLeadRequest $request): FindLeadResponse
       {
           $lead = $this->leadRepository->findLeadById($request->getId());
           // TODO обработка ситуации, когда лид не найден
           return new FindLeadResponse(
               $lead->getName()->getValue(),
               $lead->getPhone()->getValue(),
               $lead->getDescription()
           );
       }





        /**
         * @param CreateLeadRequest $request
         * @return Lead
         */
        private function createLead(CreateLeadRequest $request): Lead
        {
             $lead = new LoanLead(
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