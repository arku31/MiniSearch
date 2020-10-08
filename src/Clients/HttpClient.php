<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Clients;

use Arku\MiniSearch\Results\ApiCallResultInterface;

interface HttpClient
{
    public function performCall(string $url): ApiCallResultInterface;
}