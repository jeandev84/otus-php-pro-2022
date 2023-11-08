<?php
namespace App\Application\Contract;

use App\Application\DTO\CreateLeadRequest;
use App\Application\DTO\CreateLeadResponse;

interface LeadServiceInterface
{
    public function createAndSendLead(CreateLeadRequest $request): CreateLeadResponse;
}