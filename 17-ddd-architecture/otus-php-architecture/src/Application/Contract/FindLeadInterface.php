<?php
namespace App\Application\Contract;

use App\Application\DTO\FindLeadRequest;
use App\Application\DTO\FindLeadResponse;

interface FindLeadInterface
{
    /**
     * @param FindLeadRequest $request
     *
     * @return FindLeadResponse
    */
    public function findLead(FindLeadRequest $request): FindLeadResponse;
}