<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Factories;

use Arku\MiniSearch\Criterias\ProductSearchCriteria;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ProductSearchCriteriaFactory implements ProductSearchCriteriaFactoryInterface
{
    public function create(ServerRequestInterface $request): ProductSearchCriteriaInterface
    {
        $criteria = new ProductSearchCriteria();
        if ($id = $request->getQueryParams()['id'] ?? null) {
            $criteria->setId(intval($id));
        }
        if ($search = $request->getQueryParams()['search'] ?? null) {
            $criteria->setSearch($search);
        }

        if ($maxPrice = $request->getQueryParams()['maxPrice'] ?? null) {
            $criteria->setMaxPrice(intval($maxPrice));
        }

        if ($minPrice = $request->getQueryParams()['minPrice'] ?? null) {
            $criteria->setMinPrice(intval($minPrice));
        }
        return $criteria;
    }
}