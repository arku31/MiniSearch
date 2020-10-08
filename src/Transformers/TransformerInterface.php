<?php

namespace Arku\MiniSearch\Transformers;

use Arku\MiniSearch\Collections\CollectionInterface;

interface TransformerInterface
{
    public function transform(CollectionInterface $collection): array;
}