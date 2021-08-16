<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use Answear\EcontBundle\Enum\OfficeType;
use Answear\EcontBundle\Enum\ShipmentType;
use Webmozart\Assert\Assert;

class Office
{
    public int $id;
    public string $code;
    public bool $isMPS;
    public bool $isAPS;
    public string $name;
    public string $nameEn;
    /** @var string[] */
    public array $phones;
    /** @var string[] */
    public array $emails;
    public OfficeAddress $address;
    public string $info;
    public string $currency;
    public ?string $language;
    public ?OpeningHours $openingHours;
    public ?OpeningHours $halfDayOpeningHours = null;
    /** @var ShipmentType[] */
    public array $shipmentTypes;
    public bool $cardPaymentAllowed = true;
    public string $partnerCode;
    public string $hubCode;
    public string $hubName;
    public string $hubNameEn;
    public OfficeType $officeType;

    public static function fromArray(array $officeData): self
    {
        Assert::integer($officeData['id']);
        Assert::stringNotEmpty($officeData['code']);
        Assert::boolean($officeData['isMPS']);
        Assert::boolean($officeData['isAPS']);
        Assert::stringNotEmpty($officeData['name']);
        Assert::stringNotEmpty($officeData['nameEn']);
        Assert::allString($officeData['phones']);
        Assert::allString($officeData['emails']);
        Assert::string($officeData['info']);
        Assert::stringNotEmpty($officeData['currency']);
        Assert::nullOrString($officeData['language']);
        Assert::nullOrInteger($officeData['normalBusinessHoursFrom']);
        Assert::nullOrInteger($officeData['normalBusinessHoursTo']);
        Assert::nullOrInteger($officeData['halfDayBusinessHoursFrom']);
        Assert::nullOrInteger($officeData['halfDayBusinessHoursTo']);
        Assert::string($officeData['partnerCode']);
        Assert::stringNotEmpty($officeData['hubCode']);
        Assert::stringNotEmpty($officeData['hubName']);
        Assert::stringNotEmpty($officeData['hubNameEn']);

        $office = new self();
        $office->id = $officeData['id'];
        $office->code = $officeData['code'];
        $office->isMPS = $officeData['isMPS'];
        $office->isAPS = $officeData['isAPS'];
        $office->name = $officeData['name'];
        $office->nameEn = $officeData['nameEn'];
        $office->phones = $officeData['phones'];
        $office->emails = $officeData['emails'];
        $office->address = OfficeAddress::fromArray($officeData['address']);
        $office->info = $officeData['info'];
        $office->currency = $officeData['currency'];
        $office->language = $officeData['language'];
        if (null !== $officeData['normalBusinessHoursFrom'] && null !== $officeData['normalBusinessHoursTo']) {
            $office->openingHours = new OpeningHours(
                $officeData['normalBusinessHoursFrom'],
                $officeData['normalBusinessHoursTo']
            );
        }
        if (null !== $officeData['halfDayBusinessHoursFrom'] && null !== $officeData['halfDayBusinessHoursTo']) {
            $office->halfDayOpeningHours = new OpeningHours(
                $officeData['halfDayBusinessHoursFrom'],
                $officeData['halfDayBusinessHoursTo']
            );
        }
        $office->shipmentTypes = array_map(
            function (string $type) {
                try {
                    return ShipmentType::get($type);
                } catch (\InvalidArgumentException $exception) {
                    // NOP, do not fail hard for new services
                }
            },
            $officeData['shipmentTypes']
        );
        $office->partnerCode = $officeData['partnerCode'];
        $office->hubCode = $officeData['hubCode'];
        $office->hubName = $officeData['hubName'];
        $office->hubNameEn = $officeData['hubNameEn'];
        $office->officeType = $office->isAPS
            ? OfficeType::aps()
            : ($office->isMPS ? OfficeType::mps() : OfficeType::office());

        return $office;
    }
}
