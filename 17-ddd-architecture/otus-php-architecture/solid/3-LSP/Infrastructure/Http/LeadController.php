<?php
declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\Contract\CreateLeadInterface;
use App\Application\Contract\FindLeadInterface;
use App\Application\Contract\LeadServiceInterface;
use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\FindLeadRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;


class LeadController extends AbstractFOSRestController
{

        private CreateLeadInterface $createLeadService;
        private FindLeadInterface $findLeadService;



        /**
         * @param CreateLeadInterface $createLeadService
         * @param FindLeadInterface $findLeadService
        */
        public function __construct(CreateLeadInterface $createLeadService, FindLeadInterface $findLeadService)
        {
            $this->createLeadService = $createLeadService;
            $this->findLeadService = $findLeadService;
        }





       /**
        * @Rest\Post("/api/v1/lead")
        * @ParamConverter("createLeadRequest", converter="fos_rest.request_body")
        * @param CreateLeadRequest $createLeadRequest
        * @return Response
      */
      public function createLead(CreateLeadRequest $createLeadRequest): Response
      {
           $response = $this->createLeadService->createAndSendLead($createLeadRequest);
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
            $findLeadResponse = $this->findLeadService->findLead($findLeadRequest);
            $view = $this->view($findLeadResponse, 200);
            return $this->handleView($view);
      }
}