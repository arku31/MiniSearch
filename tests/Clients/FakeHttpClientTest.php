<?php

namespace Arku\MiniSearch\Tests\Clients;

use Arku\MiniSearch\Clients\FakeHttpClient;
use Arku\MiniSearch\Results\ApiCallResult;
use Arku\MiniSearch\Seeds\FakeDataSeederInterface;
use PHPUnit\Framework\TestCase;

final class FakeHttpClientTest extends TestCase
{
    public function testPerformCall(): void
    {
        $mock = $this->createMock(FakeDataSeederInterface::class);
        $mock->method('seed')->willReturn(json_encode(['items' => []]));
        $client = new FakeHttpClient($mock);
        $result = $client->performCall('/products');
        $this->assertEquals(
            new ApiCallResult(json_encode(['items' => []])),
            $result
        );
    }
}
