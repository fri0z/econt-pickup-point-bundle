<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Command;

use Answear\EcontBundle\Client\Client;
use Answear\EcontBundle\Client\RequestTransformer;
use Answear\EcontBundle\Request\GetOfficesRequest;
use Answear\EcontBundle\Response\GetOfficesResponse;

class GetOffices extends AbstractCommand
{
    private Client $client;
    private RequestTransformer $transformer;

    public function __construct(Client $client, RequestTransformer $transformer)
    {
        $this->client = $client;
        $this->transformer = $transformer;
    }

    public function getOffices(GetOfficesRequest $request): GetOfficesResponse
    {
        $httpRequest = $this->transformer->transform($request);
        $response = $this->client->request($httpRequest);

        $body = $this->getBody($response);

        return GetOfficesResponse::fromArray($body);
    }
}
