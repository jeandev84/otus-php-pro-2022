<?php
namespace App\Application\Contract;

use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\CreateLeadResponse;
use App\Application\DTO\FindLeadRequest;
use App\Application\DTO\FindLeadResponse;

interface LeadServiceInterface
{

    /**
     * @param CreateLeadRequest $request
     *
     * @return CreateLeadResponse
    */
    public function createAndSendLead(CreateLeadRequest $request): CreateLeadResponse;



    /**
     * @param FindLeadRequest $request
     *
     * @return FindLeadResponse
    */
    public function findLead(FindLeadRequest $request): FindLeadResponse;
}