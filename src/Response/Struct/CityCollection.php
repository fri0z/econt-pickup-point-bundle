<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Webmozart\Assert\Assert;

class CityCollection implements Countable, IteratorAggregate
{
    /**
     * @var City[]
     */
    private array $cities;

    public function __construct(array $cities)
    {
        Assert::allIsInstanceOf($cities, City::class);

        $this->cities = $cities;
    }

    /**
     * @return City[]|ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->cities);
    }

    public function count(): int
    {
        return \count($this->cities);
    }
}
