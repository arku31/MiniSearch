<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Collections;

use Arku\MiniSearch\Models\ProductModelInterface;

final class ProductCollection implements ProductCollectionInterface
{
    private array $items = [];

    public function addProduct(ProductModelInterface $product): void
    {
        $this->items[] = $product;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function toArray(): array
    {
        return array_map(fn(ProductModelInterface $product) => $product->toArray(), $this->getItems());
    }
}