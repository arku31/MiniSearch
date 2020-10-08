<?php

namespace Arku\MiniSearch\Collections;

use Arku\MiniSearch\Models\ProductModelInterface;

interface ProductCollectionInterface extends CollectionInterface
{
    public function addProduct(ProductModelInterface $product): void;
}