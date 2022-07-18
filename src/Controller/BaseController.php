<?php

namespace App\Controller;


use Psr\Log\LoggerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BaseController extends AbstractController
{
    private $logger;

    protected function log($msg, $type) {
        if($type == 'info') {
            $this->logger->info($msg);
        } elseif($type == 'warning') {
            $this->logger->warning($msg);
        } else {
            $this->logger->error($msg);
        }
    }

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }
}
