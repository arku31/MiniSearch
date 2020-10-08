<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Results;

use Arku\MiniSearch\Exceptions\InvalidApiResponseException;

final class ApiCallResult implements ApiCallResultInterface
{
    private array $products;

    public function __construct(string $data)
    {
        $this->parseData($this->decode($data));
    }

    private function parseData(array $data): void
    {
        if (!isset($data['items'])) {
            throw new InvalidApiResponseException('Missing items');
        }
        $this->products = $data['items'];
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    private function decode(string $data): array
    {
        return json_decode($data, true);
    }
}