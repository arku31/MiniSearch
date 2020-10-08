<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\ServiceProviders;

use Arku\MiniSearch\Clients\FakeHttpClient;
use Arku\MiniSearch\Clients\HttpClient;
use Arku\MiniSearch\Controllers\ProductController;
use Arku\MiniSearch\Factories\ProductSearchCriteriaFactory;
use Arku\MiniSearch\Factories\ProductSearchCriteriaFactoryInterface;
use Arku\MiniSearch\Repositories\ProductRepository;
use Arku\MiniSearch\Repositories\ProductRepositoryInterface;
use Arku\MiniSearch\ServiceProviders\ApplicationServiceProvider;
use Arku\MiniSearch\Services\ProductService;
use Arku\MiniSearch\Services\ProductServiceInterface;
use DI\Container;
use PHPUnit\Framework\TestCase;

final class ServiceProviderTest extends TestCase
{
    public function testServiceProvider(): void
    {
        $container = new Container();
        $provider = new ApplicationServiceProvider($container);
        $provider->register();
        $this->assertInstanceOf(FakeHttpClient::class, $container->get(HttpClient::class));
        $this->assertInstanceOf(
            ProductSearchCriteriaFactory::class,
            $container->get(ProductSearchCriteriaFactoryInterface::class)
        );
        $this->assertInstanceOf(ProductRepository::class, $container->get(ProductRepositoryInterface::class));
        $this->assertInstanceOf(ProductService::class, $container->get(ProductServiceInterface::class));
        $this->assertInstanceOf(ProductController::class, $container->get(ProductController::class));
    }

}