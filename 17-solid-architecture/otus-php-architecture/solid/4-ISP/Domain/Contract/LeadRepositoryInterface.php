<?php
namespace App\Domain\Contract;

use App\Domain\Model\Lead;

interface LeadRepositoryInterface
{
     public function findLeadById(string $id): ?Lead;
}