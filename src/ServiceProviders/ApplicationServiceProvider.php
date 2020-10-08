<?php

declare(strict_types=1);

namespace Arku\MiniSearch\ServiceProviders;

use Arku\MiniSearch\Clients\FakeHttpClient;
use Arku\MiniSearch\Clients\HttpClient;
use Arku\MiniSearch\Controllers\ProductController;
use Arku\MiniSearch\Factories\ProductSearchCriteriaFactory;
use Arku\MiniSearch\Factories\ProductSearchCriteriaFactoryInterface;
use Arku\MiniSearch\Repositories\ProductRepository;
use Arku\MiniSearch\Repositories\ProductRepositoryInterface;
use Arku\MiniSearch\Seeds\FakeDataSeeder;
use Arku\MiniSearch\Services\ProductService;
use Arku\MiniSearch\Services\ProductServiceInterface;
use Arku\MiniSearch\Transformers\ProductTransformer;
use DI\Container;

final class ApplicationServiceProvider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->set(
            HttpClient::class,
            new FakeHttpClient(new FakeDataSeeder())
        );

        $this->container->set(
            ProductSearchCriteriaFactoryInterface::class,
            new ProductSearchCriteriaFactory()
        );

        $this->container->set(
            ProductRepositoryInterface::class,
            $this->container->get(ProductRepository::class)
        );

        $this->container->set(
            ProductServiceInterface::class,
            $this->container->get(ProductService::class)
        );

        $this->container->set(
            ProductController::class,
            new ProductController(
                $this->container->get(ProductServiceInterface::class),
                $this->container->get(ProductSearchCriteriaFactoryInterface::class),
                new ProductTransformer()
            )
        );
    }
}