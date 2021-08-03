<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Tests\Unit\Client;

use Answear\EcontBundle\Client\Serializer;
use Answear\EcontBundle\Request\GetOfficesRequest;
use Answear\EcontBundle\Request\Request;
use PHPUnit\Framework\TestCase;

class SerializerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function bodySerialization(Request $request, string $expectedBody): void
    {
        $serializer = new Serializer();

        $this->assertSame($expectedBody, $serializer->serialize($request));
    }

    public function provider(): iterable
    {
        yield 'requestFields' => [
            $this->getRequest('GR', 1),
            '{"countryCode":"GR","cityId":1}',
        ];

        yield 'skipNullValues' => [
            $this->getRequest('GR', null),
            '{"countryCode":"GR"}',
        ];
    }

    private function getRequest(string $countryCode = null, ?int $cityId = null): Request
    {
        return new GetOfficesRequest($countryCode, $cityId);
    }
}
