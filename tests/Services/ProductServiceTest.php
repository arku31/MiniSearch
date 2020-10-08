<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Services;

use Arku\MiniSearch\Collections\ProductCollection;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;
use Arku\MiniSearch\Repositories\ProductRepositoryInterface;
use Arku\MiniSearch\Services\ProductService;
use PHPUnit\Framework\TestCase;

final class ProductServiceTest extends TestCase
{
    public function testService(): void
    {
        $productRepository = $this->createMock(ProductRepositoryInterface::class);
        $productRepository->method('getByCriteria')->willReturn(new ProductCollection());
        $service = new ProductService($productRepository);
        $result = $service->getProductsByCriteria($this->createMock(ProductSearchCriteriaInterface::class));
        $this->assertEquals(new ProductCollection(), $result);
    }
}