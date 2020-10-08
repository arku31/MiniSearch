<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Results;

use Arku\MiniSearch\Exceptions\InvalidApiResponseException;
use Arku\MiniSearch\Results\ApiCallResult;
use PHPUnit\Framework\TestCase;

final class ApiResultTest extends TestCase
{
    public function testSuccess(): void
    {
        $data = json_encode(['items' => ['test']]);
        $apiCallResult = new ApiCallResult($data);
        $result = $apiCallResult->getProducts();
        $this->assertEquals($result, ['test']);
    }

    public function testInvalid(): void
    {
        $data = json_encode([]);
        $this->expectException(InvalidApiResponseException::class);
        new ApiCallResult($data);
    }

}