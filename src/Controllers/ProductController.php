<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Controllers;

use Arku\MiniSearch\Factories\ProductSearchCriteriaFactoryInterface;
use Arku\MiniSearch\Services\ProductServiceInterface;
use Arku\MiniSearch\Transformers\TransformerInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ProductController implements ControllerInterface
{
    private ProductServiceInterface $productService;
    private ProductSearchCriteriaFactoryInterface $productSearchCriteriaFactory;
    private TransformerInterface $productTransformer;

    public function __construct(
        ProductServiceInterface $productService,
        ProductSearchCriteriaFactoryInterface $productSearchCriteriaFactory,
        TransformerInterface $productTransformer
    ) {
        $this->productService = $productService;
        $this->productSearchCriteriaFactory = $productSearchCriteriaFactory;
        $this->productTransformer = $productTransformer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $criteria = $this->productSearchCriteriaFactory->create($request);
        $productCollection = $this->productService->getProductsByCriteria($criteria);
        $responseData = $this->productTransformer->transform($productCollection);
        return new JsonResponse($responseData);
    }
}