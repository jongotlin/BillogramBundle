<?php

namespace JGI\BillogramBundle\Listener;

use Billogram\Api\Event\RequestEvent;
use Psr\Log\LoggerInterface;

class LoggerListener
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param RequestEvent $event
     */
    public function whenRequestIsProcessed(RequestEvent $event)
    {
        $this->logger->info(
            sprintf(
                'Billogram request to "%s" with status code %s',
                $event->getUrl(),
                $event->getStatusCode()
            )
        );
    }
}
