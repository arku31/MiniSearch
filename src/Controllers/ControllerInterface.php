<?php

namespace Arku\MiniSearch\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ControllerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface;
}