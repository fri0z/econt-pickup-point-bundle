<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Command;

use Answear\EcontBundle\Client\Client;
use Answear\EcontBundle\Client\RequestTransformer;
use Answear\EcontBundle\Request\GetCitiesRequest;
use Answear\EcontBundle\Response\GetCitiesResponse;

class GetCities extends AbstractCommand
{
    private Client $client;
    private RequestTransformer $transformer;

    public function __construct(Client $client, RequestTransformer $transformer)
    {
        $this->client = $client;
        $this->transformer = $transformer;
    }

    public function getCities(GetCitiesRequest $request): GetCitiesResponse
    {
        $httpRequest = $this->transformer->transform($request);
        $response = $this->client->request($httpRequest);

        $body = $this->getBody($response);

        return GetCitiesResponse::fromArray($body);
    }
}
