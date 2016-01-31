<?php

namespace JGI\BillogramBundle\Listener;

use Billogram\Api\Event\RequestEvent;
use JGI\BillogramBundle\DataCollector\ApiCall;
use JGI\BillogramBundle\DataCollector\Logger;

class DataCollectorListener
{
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param RequestEvent $event
     */
    public function whenRequestIsProcessed(RequestEvent $event)
    {
        $this->logger->addApiCall(new ApiCall($event->getUrl(), $event->getStatusCode()));
    }
}
