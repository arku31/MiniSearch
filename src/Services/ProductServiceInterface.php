<?php

namespace Arku\MiniSearch\Services;

use Arku\MiniSearch\Collections\ProductCollectionInterface;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;

interface ProductServiceInterface
{
    public function getProductsByCriteria(ProductSearchCriteriaInterface $criteria): ProductCollectionInterface;
}