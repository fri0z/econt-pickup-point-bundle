<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Client;

use Answear\EcontBundle\ConfigProvider;
use Answear\EcontBundle\Exception\ServiceUnavailableException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private ClientInterface $client;

    public function __construct(
        ConfigProvider $configuration,
        ?ClientInterface $client = null
    ) {
        $this->client = $client ?? new GuzzleClient($configuration->getRequestHeaders());
    }

    public function request(Request $request): ResponseInterface
    {
        try {
            $response = $this->client->send($request);

            if ($response->getBody()->isSeekable()) {
                $response->getBody()->rewind();
            }
        } catch (GuzzleException $e) {
            throw new ServiceUnavailableException($e->getMessage(), $e->getCode(), $e);
        }

        return $response;
    }
}
