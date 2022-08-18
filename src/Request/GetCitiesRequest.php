<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Request;

class GetCitiesRequest extends Request
{
    private const ENDPOINT = 'NomenclaturesService.getCities.json';
    private const HTTP_METHOD = 'POST';

    private ?string $countryCode;

    public function __construct(?string $countryCode = null)
    {
        $this->countryCode = $countryCode;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function getMethod(): string
    {
        return self::HTTP_METHOD;
    }
}
