<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response\Struct;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Webmozart\Assert\Assert;

class OfficeCollection implements Countable, IteratorAggregate
{
    /**
     * @var Office[]
     */
    private array $offices;

    public function __construct(array $offices)
    {
        Assert::allIsInstanceOf($offices, Office::class);

        $this->offices = $offices;
    }

    /**
     * @return Office[]|ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->offices);
    }

    public function count(): int
    {
        return \count($this->offices);
    }
}
