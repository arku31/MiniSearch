<?php

declare(strict_types=1);

namespace Arku\MiniSearch;

use Arku\MiniSearch\Controllers\ProductController;
use Arku\MiniSearch\ServiceProviders\ApplicationServiceProvider;
use DI\Container;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;

final class Application
{
    private Container $container;

    public function __construct()
    {
        if (!defined('ROOT_DIR')){
            define('ROOT_DIR', pathinfo(__DIR__)['dirname']);
        }

        $this->container = new Container();
        (new ApplicationServiceProvider($this->container))->register();
    }
    public function run(): Response
    {
        $request = ServerRequestFactory::fromGlobals();
        return $this->container->get(ProductController::class) //we don't need router as we have a single route
            ->handle($request);
    }
}