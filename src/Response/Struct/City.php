<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use Webmozart\Assert\Assert;

class City
{
    public int $id;
    public Country $country;
    public string $postalCode;
    public string $name;
    public string $nameEn;
    public ?string $regionName;
    public ?string $regionNameEn;
    public ?string $phoneCode;
    public ?bool $expressDeliveries;

    public static function fromArray(array $cityData): self
    {
        Assert::keyExists($cityData, 'id');
        Assert::keyExists($cityData, 'country');
        Assert::keyExists($cityData, 'postCode');
        Assert::keyExists($cityData, 'name');
        Assert::keyExists($cityData, 'nameEn');
        Assert::keyExists($cityData, 'regionName');
        Assert::keyExists($cityData, 'regionNameEn');
        Assert::keyExists($cityData, 'regionNameEn');
        Assert::keyExists($cityData, 'phoneCode');
        Assert::keyExists($cityData, 'expressCityDeliveries');

        $city = new self;
        $city->id = $cityData['id'];
        $city->country = Country::fromArray($cityData['country']);
        $city->postalCode = $cityData['postCode'];
        $city->name = $cityData['name'];
        $city->nameEn = $cityData['nameEn'];
        $city->regionName = $cityData['regionName'];
        $city->regionNameEn = $cityData['regionNameEn'];
        $city->phoneCode = $cityData['phoneCode'];
        $city->expressDeliveries = $cityData['expressCityDeliveries'];

        return $city;
    }
}