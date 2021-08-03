<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Enum;

use MabeEnum\Enum;

class ShipmentType extends Enum
{
    public const DOCUMENT = 'document';
    public const PACK = 'pack';
    public const POST_PACK = 'post_pack';
    public const PALLET = 'pallet';
    public const CARGO = 'cargo';
    public const DOCUMENT_PALLET = 'documentpallet';
    public const BIT_LETTER = 'big_letter';
    public const SMALL_LETTER = 'small_letter';
    public const MONEY_TRANSFER = 'money_transfer';
    // additional types found
    public const COURIER = 'courier';
    public const POST = 'post';

    public static function post(): self
    {
        return static::get(static::POST);
    }

    public static function courier(): self
    {
        return static::get(static::COURIER);
    }

    public static function moneyTransfer(): self
    {
        return static::get(static::MONEY_TRANSFER);
    }

    public static function smallLetter(): self
    {
        return static::get(static::SMALL_LETTER);
    }

    public static function bitLetter(): self
    {
        return static::get(static::BIT_LETTER);
    }

    public static function documentPallet(): self
    {
        return static::get(static::DOCUMENT_PALLET);
    }

    public static function cargo(): self
    {
        return static::get(static::CARGO);
    }

    public static function pallet(): self
    {
        return static::get(static::PALLET);
    }

    public static function postPack(): self
    {
        return static::get(static::POST_PACK);
    }

    public static function pack(): self
    {
        return static::get(static::PACK);
    }

    public static function document(): self
    {
        return static::get(static::DOCUMENT);
    }
}
