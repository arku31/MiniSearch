<?php

namespace Arku\MiniSearch\Factories;

use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ProductSearchCriteriaFactoryInterface
{
    public function create(ServerRequestInterface $request): ProductSearchCriteriaInterface;
}