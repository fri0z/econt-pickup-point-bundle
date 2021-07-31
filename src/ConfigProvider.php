<?php

declare(strict_types=1);

namespace Answear\EcontBundle;

class ConfigProvider
{
    private const URL = 'http://ee.econt.com/';
    private const SERVICE_URL = '/services/Nomenclatures/';

    public function getUrl(): string
    {
        return static::URL;
    }

    public function getServiceUrl(): string
    {
        return static::SERVICE_URL;
    }
}
