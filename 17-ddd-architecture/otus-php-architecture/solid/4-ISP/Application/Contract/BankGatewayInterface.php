<?php
namespace App\Application\Contract;

use App\Application\DTO\SendLeadGatewayRequest;
use App\Application\DTO\SendLeadGatewayResponse;

interface BankGatewayInterface
{
    public function sendLead(SendLeadGatewayRequest $request): SendLeadGatewayResponse;
}