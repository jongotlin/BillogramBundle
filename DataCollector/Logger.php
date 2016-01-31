<?php

declare(strict_types=1);

namespace JGI\BillogramBundle\DataCollector;

class Logger
{
    protected $apiCalls = [];

    public function addApiCall(ApiCall $apiCall)
    {
        $this->apiCalls[] = $apiCall;
    }

    public function getApiCalls(): array
    {
        return $this->apiCalls;
    }
}
