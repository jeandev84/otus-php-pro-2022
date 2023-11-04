<?php
namespace App\Application\Service;

use App\Application\Contract\FindLeadInterface;
use App\Application\DTO\FindLeadRequest;
use App\Application\DTO\FindLeadResponse;
use App\Domain\Contract\LeadRepositoryInterface;

class FindLeadUseCase implements FindLeadInterface
{


    /**
     * @var LeadRepositoryInterface
    */
    private LeadRepositoryInterface $leadRepository;



    /**
     * @param LeadRepositoryInterface $leadRepository
    */
    public function __construct(LeadRepositoryInterface $leadRepository)
    {
         $this->leadRepository = $leadRepository;
    }


    /**
     * @inheritDoc
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
}