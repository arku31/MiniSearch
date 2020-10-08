<?php

namespace Arku\MiniSearch\Repositories;

use Arku\MiniSearch\Collections\ProductCollection;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;

interface ProductRepositoryInterface
{
    public function getByCriteria(ProductSearchCriteriaInterface $criteria): ProductCollection;
}