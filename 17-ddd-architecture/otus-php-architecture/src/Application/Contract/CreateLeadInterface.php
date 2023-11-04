<?php
namespace App\Application\Contract;

use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\CreateLeadResponse;

interface CreateLeadInterface
{
    /**
     * @param CreateLeadRequest $request
     *
     * @return CreateLeadResponse
     */
    public function createAndSendLead(CreateLeadRequest $request): CreateLeadResponse;
}