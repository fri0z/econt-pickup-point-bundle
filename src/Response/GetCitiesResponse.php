<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response;

use Answear\EcontBundle\Response\Struct\City;
use Answear\EcontBundle\Response\Struct\CityCollection;
use Webmozart\Assert\Assert;

class GetCitiesResponse
{
    public CityCollection $cities;

    public function __construct(CityCollection $cities)
    {
        $this->cities = $cities;
    }

    public function getCities(): CityCollection
    {
        return $this->cities;
    }

    public static function fromArray(array $arrayResponse): self
    {
        Assert::keyExists($arrayResponse, 'cities');

        return new self(
            new CityCollection(
                array_map(
                    fn ($cityData) => City::fromArray($cityData),
                    $arrayResponse['cities']
                )
            )
        );
    }
}
