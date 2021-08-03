<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use Webmozart\Assert\Assert;

class OfficeAddress
{
    public ?int $id;
    public City $city;
    public string $fullAddress;
    public ?string $quarter;
    public ?string $street;
    public ?string $num;
    public string $other;
    public ?Coordinates $coordinates;
    public ?string $postalCode;

    public static function fromArray(array $addressData): self
    {
        Assert::keyExists($addressData, 'id');
        Assert::keyExists($addressData, 'city');
        Assert::keyExists($addressData, 'fullAddress');
        Assert::keyExists($addressData, 'quarter');
        Assert::keyExists($addressData, 'street');
        Assert::keyExists($addressData, 'num');
        Assert::keyExists($addressData, 'other');
        Assert::keyExists($addressData, 'location');
        Assert::keyExists($addressData, 'zip');

        $address = new self();
        $address->id = $addressData['id'];
        $address->city = City::fromArray($addressData['city']);
        $address->fullAddress = $addressData['fullAddress'];
        $address->quarter = $addressData['quarter'];
        $address->street = $addressData['street'];
        $address->num = $addressData['num'];
        $address->other = $addressData['other'];
        $address->coordinates = Coordinates::fromArray($addressData['location']);
        $address->postalCode = $addressData['zip'];

        return $address;
    }
}
