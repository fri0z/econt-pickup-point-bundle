<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Tests\Unit;

use Answear\EcontBundle\ConfigProvider;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    /**
     * @test
     */
    public function gettersAreValid(): void
    {
        $configuration = new ConfigProvider();

        $this->assertSame('http://ee.econt.com/', $configuration->getUrl());
        $this->assertSame('/services/Nomenclatures/', $configuration->getServiceURI());
    }
}
