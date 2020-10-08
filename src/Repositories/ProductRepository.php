<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Repositories;

use Arku\MiniSearch\Clients\HttpClient;
use Arku\MiniSearch\Collections\ProductCollection;
use Arku\MiniSearch\Criterias\ProductSearchCriteriaInterface;
use Arku\MiniSearch\Models\Product;

final class ProductRepository implements ProductRepositoryInterface
{
    private const PRODUCTS_ENDPOINT = '/products';

    private HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    public function getByCriteria(ProductSearchCriteriaInterface $criteria): ProductCollection
    {
        $products = $this->client->performCall($this->prepareQuery($criteria));

        $collection = new ProductCollection();
        foreach ($products->getProducts() as $productData) {
            $product = new Product(
                $productData['id'],
                $productData['name'],
                intval($productData['price'] * 100), //our system is using integer everywhere
            );
            $collection->addProduct($product);
        }
        return $collection;
    }

    private function prepareQuery(ProductSearchCriteriaInterface $criteria): string
    {
        $url = self::PRODUCTS_ENDPOINT . '?';

        $items = [
            'id' => $criteria->getId(),
            'term' => $criteria->getSearch(),
            'minPrice' => $criteria->getMinPrice(),
            'maxPrice' => $criteria->getMaxPrice(),
        ];

        return $url . http_build_query(array_filter($items));
    }
}