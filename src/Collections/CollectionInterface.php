<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Collections;

use Arku\MiniSearch\Support\Arrayable;

interface CollectionInterface extends Arrayable
{
    public function getItems(): array;
}