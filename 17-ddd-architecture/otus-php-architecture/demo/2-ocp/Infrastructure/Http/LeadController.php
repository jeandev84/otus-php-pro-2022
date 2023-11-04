<?php
declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\Contract\LeadServiceInterface;
use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\FindLeadRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;


class LeadController extends AbstractFOSRestController
{

      private LeadServiceInterface $leadService;


      /**
       * @param LeadServiceInterface $leadService
      */
      public function __construct(LeadServiceInterface $leadService)
      {
          $this->leadService = $leadService;
      }



      /**
       * @Rest\Post("/api/v1/lead")
       * @ParamConverter("createLeadRequest", converter="fos_rest.request_body")
       * @param CreateLeadRequest $createLeadRequest
       * @return Response
      */
      public function createLead(CreateLeadRequest $createLeadRequest): Response
      {
           $response = $this->leadService->createAndSendLead($createLeadRequest);
           $view     = $this->view($response, 201);
           return $this->handleView($view);
      }




      /**
       * @Rest\Get("/api/v1/lead/{id}")
       * @param string $id
       * @return Response
      */
      public function findLead(string $id): Response
      {
            $findLeadRequest  = new FindLeadRequest($id);
            $findLeadResponse = $this->leadService->findLead($findLeadRequest);
            $view = $this->view($findLeadResponse, 200);
            return $this->handleView($view);
      }
}