<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Response;

use RuntimeException;
use Webmozart\Assert\Assert;

class ErrorResponse
{
    public string $message;
    public string $type;
    /** @var string[] */
    public array $fields;
    /** @var null|ErrorResponse[] */
    public ?array $innerErrors;

    public function __construct(string $message, string $type, array $fields, ?array $innerErrors)
    {
        $this->message = $message;
        $this->type = $type;
        $this->fields = $fields;
        $this->innerErrors = $innerErrors;
    }

    public static function isErrorResponse(array $response): bool
    {
        return isset($response['error']);
    }

    public static function fromArray(array $response): self
    {
        if (!static::isErrorResponse($response)) {
            throw new RuntimeException('Cannot create ErrorResponse');
        }

        $response = $response['error'];

        Assert::keyExists($response, 'message');
        Assert::keyExists($response, 'type');
        Assert::keyExists($response, 'fields');
        Assert::keyExists($response, 'innerErrors');

        return new self($response['message'], $response['type'], $response['fields'], $response['innerErrors']);
    }
}
