<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Collections;

use Arku\MiniSearch\Collections\ProductCollection;
use Arku\MiniSearch\Models\ProductModelInterface;
use PHPUnit\Framework\TestCase;

final class ProductCollectionsTest extends TestCase
{
    public function testAddToCollection(): void
    {
        $collection = new ProductCollection();
        $mock = $this->createMock(ProductModelInterface::class);
        $collection->addProduct($mock);
        $this->assertEquals([$mock], $collection->getItems());
    }

    public function testCollectionToArray(): void
    {
        $collection = new ProductCollection();
        $mock = $this->createMock(ProductModelInterface::class);
        $mock->method('toArray')->willReturn(
            [
                'id' => 1,
                'name' => 'test',
                'price' => 2
            ]
        );

        $collection->addProduct($mock);
        $this->assertEquals(
            [
                [
                    'id' => 1,
                    'name' => 'test',
                    'price' => 2
                ]
            ],
            $collection->toArray()
        );
    }
}