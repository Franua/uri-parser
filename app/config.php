<?php

use function DI\object;
use UriParser\Domain\Service\UriParserService;

return [
    'UriParserService' => object(UriParserService::class),

    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../app/resources/views');
        return new Twig_Environment($loader);
    },
];
