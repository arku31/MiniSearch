<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Clients;

use Arku\MiniSearch\Results\ApiCallResult;
use Arku\MiniSearch\Results\ApiCallResultInterface;
use Arku\MiniSearch\Seeds\FakeDataSeederInterface;

final class FakeHttpClient implements HttpClient
{
    private FakeDataSeederInterface $dataSeeder;

    public function __construct(FakeDataSeederInterface $dataSeeder)
    {
        $this->dataSeeder = $dataSeeder;
    }

    public function performCall(string $url): ApiCallResultInterface
    {
        $data = $this->dataSeeder->seed($url);

        return new ApiCallResult($data);
    }
}