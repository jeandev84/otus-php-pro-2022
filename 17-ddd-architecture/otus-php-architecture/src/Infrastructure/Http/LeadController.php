<?php
declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\DTO\CreateLeadRequest;
use App\Application\Service\LeadService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;


class LeadController extends AbstractFOSRestController
{


      private LeadService $leadService;


      /**
       * @param LeadService $leadService
      */
      public function __construct(LeadService $leadService)
      {
          $this->leadService = $leadService;
      }



      /**
       * @Rest\Post("/api/v1/lead")
       * @ParamConverter("createLeadRequest", converter="fos_rest.request_body")
       *
       * @param CreateLeadRequest $createLeadRequest
       * @return Response
      */
      public function createLead(CreateLeadRequest $createLeadRequest): Response
      {
           $response = $this->leadService->createAndSendLead($createLeadRequest);
           $view     = $this->view($response, 201);
           return $this->handleView($view);
      }
}