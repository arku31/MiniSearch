<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Services;

use Arku\MiniSearch\Collections\ProductCollection;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;
use Arku\MiniSearch\Repositories\ProductRepositoryInterface;

final class ProductService implements ProductServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getProductsByCriteria(ProductSearchCriteriaInterface $criteria): ProductCollection
    {
        //although it is basically empty, this is a perfect place to modify data
        return $this->productRepository->getByCriteria($criteria);
    }
}