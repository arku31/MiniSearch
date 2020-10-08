<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Transformers;

use Arku\MiniSearch\Collections\CollectionInterface;

final class ProductTransformer implements TransformerInterface
{
    public function transform(CollectionInterface $collection): array
    {
        return $collection->toArray();
    }
}