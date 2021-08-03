<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use Webmozart\Assert\Assert;

class Country
{
    public int $id;
    public string $code2;
    public string $code3;
    public string $name;
    public string $nameEn;
    public bool $isEU;

    public static function fromArray(array $countryData): self
    {
        Assert::keyExists($countryData, 'id');
        Assert::keyExists($countryData, 'code2');
        Assert::keyExists($countryData, 'code3');
        Assert::keyExists($countryData, 'name');
        Assert::keyExists($countryData, 'nameEn');
        Assert::keyExists($countryData, 'isEU');

        $country = new self();
        $country->id = $countryData['id'];
        $country->code2 = $countryData['code2'];
        $country->code3 = $countryData['code3'];
        $country->name = $countryData['name'];
        $country->nameEn = $countryData['nameEn'];
        $country->isEU = $countryData['isEU'];

        return $country;
    }
}
