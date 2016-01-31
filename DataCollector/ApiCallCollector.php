<?php

declare(strict_types=1);

namespace JGI\BillogramBundle\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class ApiCallCollector extends DataCollector
{
    protected $logger;

    protected $sandbox;

    public function __construct(Logger $logger, bool $sandbox)
    {
        $this->logger = $logger;
        $this->sandbox = $sandbox;
    }

    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data['calls'] = $this->logger->getApiCalls();
        $this->data['sandbox'] = $this->sandbox;
    }

    public function getApiCallsCount(): int
    {
        return count($this->data['calls']);
    }

    public function getApiCalls(): array
    {
        return $this->data['calls'];
    }

    public function hasErrors(): bool
    {
        /** @var \JGI\BillogramBundle\DataCollector\ApiCall $apiCall */
        foreach ($this->data['calls'] as $apiCall) {
            if ($apiCall->getStatusCode() != 200) {
                return true;
            }
        }

        return false;
    }

    public function isSandbox(): bool
    {
        return $this->data['sandbox'];
    }

    public function getName(): string
    {
        return 'jgi.billogram.collector';
    }
}
