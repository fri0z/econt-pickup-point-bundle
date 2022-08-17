<?php

declare(strict_types=1);

namespace Answear\EcontBundle;

class ConfigProvider
{
    private const URL = 'http://ee.econt.com/';
    private const SERVICE_URI = '/services/Nomenclatures/';

    private string $user;
    private string $password;

    public function __construct(string $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function getRequestHeaders(): array
    {
        return [
            'base_uri' => $this->getUrl(),
            'auth' => [$this->getUser(), $this->getPassword()],
        ];
    }

    public function getUrl(): string
    {
        return self::URL;
    }

    public function getServiceURI(): string
    {
        return self::SERVICE_URI;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
