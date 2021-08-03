<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use Webmozart\Assert\Assert;

class Coordinates
{
    public float $latitude;
    public float $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        Assert::range($latitude, -90, 90);
        Assert::range($longitude, -180, 180);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function fromArray(array $coordsData): ?self
    {
        try {
            Assert::keyExists($coordsData, 'latitude');
            Assert::keyExists($coordsData, 'longitude');
            Assert::float($coordsData['latitude']);
            Assert::float($coordsData['longitude']);

            return new self($coordsData['latitude'], $coordsData['longitude']);
        } catch (\InvalidArgumentException $exception) {
            return null;
        }
    }
}
