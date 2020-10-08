<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Services;

use Arku\MiniSearch\Collections\CollectionInterface;
use Arku\MiniSearch\Models\ProductModelInterface;
use Arku\MiniSearch\Transformers\ProductTransformer;
use PHPUnit\Framework\TestCase;

final class ProductTransformerTest extends TestCase
{
    public function testService(): void
    {
        $transformer = new ProductTransformer();
        $collection = $this->createMock(CollectionInterface::class);
        $productModel = $this->createMock(ProductModelInterface::class);
        $collection->method('toArray')->willReturn([$productModel]);
        $result = $transformer->transform($collection);
        $this->assertEquals([$productModel], $result);
    }
}