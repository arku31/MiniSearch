<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Models;

use Arku\MiniSearch\Models\Product;
use PHPUnit\Framework\TestCase;

final class ProductSearchCriteriaFactoryTest extends TestCase
{
    public function testModel(): void
    {
        $productModel = new Product(1, 'test', 1000);
        $this->assertEquals(1, $productModel->getId());
        $this->assertEquals('test', $productModel->getName());
        $this->assertEquals(1000, $productModel->getPrice());
        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'test',
                'price' => 1000,
            ],
            $productModel->toArray()
        );
    }
}