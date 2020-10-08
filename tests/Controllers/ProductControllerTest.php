<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Controllers;

use Arku\MiniSearch\Controllers\ProductController;
use Arku\MiniSearch\Factories\ProductSearchCriteriaFactoryInterface;
use Arku\MiniSearch\Services\ProductServiceInterface;
use Arku\MiniSearch\Transformers\TransformerInterface;
use Laminas\Diactoros\Response\JsonResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

final class ProductControllerTest extends TestCase
{
    public function testHandle(): void
    {
        $controller = new ProductController(
            $this->createMock(ProductServiceInterface::class),
            $this->createMock(ProductSearchCriteriaFactoryInterface::class),
            $this->createMock(TransformerInterface::class),
        );
        $request = $this->createMock(ServerRequestInterface::class);
        $result = $controller->handle($request);
        $this->assertInstanceOf(JsonResponse::class, $result);
        $this->assertEquals('[]', $result->getBody()->getContents());
    }
}
