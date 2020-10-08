<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Factories;

use Arku\MiniSearch\Criterias\ProductSearchCriteria;
use Arku\MiniSearch\Factories\ProductSearchCriteriaFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

final class ProductSearchCriteriaFactoryTest extends TestCase
{
    private ProductSearchCriteriaFactory $factory;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new ProductSearchCriteriaFactory();
    }

    public function testFactoryId(): void
    {
        $mock = $this->createMock(ServerRequestInterface::class);
        $mock->method('getQueryParams')->willReturn(
            [
                'id' => 123
            ]
        );
        $criteria = $this->factory->create($mock);
        $this->assertEquals($criteria, (new ProductSearchCriteria())->setId(123));
    }

    public function testFactorySearch(): void
    {
        $mock = $this->createMock(ServerRequestInterface::class);
        $mock->method('getQueryParams')->willReturn(
            [
                'search' => 'test'
            ]
        );
        $criteria = $this->factory->create($mock);
        $this->assertEquals($criteria, (new ProductSearchCriteria())->setSearch('test'));
    }

    public function testFactoryMinPrice(): void
    {
        $mock = $this->createMock(ServerRequestInterface::class);
        $mock->method('getQueryParams')->willReturn(
            [
                'minPrice' => 5
            ]
        );
        $criteria = $this->factory->create($mock);
        $this->assertEquals($criteria, (new ProductSearchCriteria())->setMinPrice(5));
    }

    public function testFactoryMaxPrice(): void
    {
        $mock = $this->createMock(ServerRequestInterface::class);
        $mock->method('getQueryParams')->willReturn(
            [
                'maxPrice' => 5
            ]
        );
        $criteria = $this->factory->create($mock);
        $this->assertEquals($criteria, (new ProductSearchCriteria())->setMaxPrice(5));
    }

    public function testFactoryAll(): void
    {
        $mock = $this->createMock(ServerRequestInterface::class);
        $mock->method('getQueryParams')->willReturn(
            [
                'minPrice' => 5,
                'maxPrice' => 10,
                'search' => 'test',
                'id' => 123
            ]
        );
        $criteria = $this->factory->create($mock);
        $expected = (new ProductSearchCriteria())
            ->setId(123)
            ->setSearch('test')
            ->setMinPrice(5)
            ->setMaxPrice(10);
        $this->assertEquals($expected, $criteria);
    }
}