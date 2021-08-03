<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Request;

abstract class Request
{
    abstract public function getEndpoint(): string;

    abstract public function getMethod(): string;
}
