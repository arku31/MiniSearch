<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Criterias;

use Arku\MiniSearch\Exceptions\InvalidApiResponseException;
use Exception;
use PHPUnit\Framework\TestCase;

final class InvalidApiExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->assertInstanceOf(Exception::class, new InvalidApiResponseException());
    }
}