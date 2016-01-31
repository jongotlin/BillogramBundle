<?php

declare(strict_types=1);

namespace JGI\BillogramBundle\DataCollector;

class ApiCall
{
    protected $url;

    protected $statusCode;

    public function __construct(string $url, int $statusCode)
    {
        $this->url = $url;
        $this->statusCode = $statusCode;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getPath(): string
    {
        $result = parse_url($this->getUrl());

        return $result['path'];
    }
}
