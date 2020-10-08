<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Repositories;

use Arku\MiniSearch\Clients\HttpClient;
use Arku\MiniSearch\Collections\ProductCollection;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;
use Arku\MiniSearch\Repositories\ProductRepository;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

final class ProductRepositoryTest extends TestCase
{
    public function testRepository(): void
    {
        $client = $this->createMock(HttpClient::class);
        $repository = new ProductRepository($client);
        $result = $repository->getByCriteria($this->createMock(ProductSearchCriteriaInterface::class));
        $this->assertEquals($result, new ProductCollection());
    }

    public function testUrl(): void
    {
        $client = $this->createMock(HttpClient::class);

        $method = new ReflectionMethod(ProductRepository::class, "prepareQuery");
        $method->setAccessible(true);

        $repository = new ProductRepository($client);
        $mock = $this->createMock(ProductSearchCriteriaInterface::class);
        $mock->method('getId')->willReturn(1);
        $mock->method('getSearch')->willReturn('test');
        $result = $method->invoke($repository, $mock);
        $this->assertEquals('/products?id=1&term=test', $result);
    }
}