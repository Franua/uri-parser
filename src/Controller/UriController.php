<?php

namespace UriParser\Controller;

use Twig_Environment;
use UriParser\Domain\Input\UriInput;
use UriParser\Domain\Service\UriParserService;

class UriController
{
    /**
     * @var UriParserService
     */
    private $uriParser;

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * UriController constructor.
     * @param UriParserService $uriParser
     * @param Twig_Environment $twig
     */
    public function __construct(UriParserService $uriParser, Twig_Environment $twig)
    {
        $this->twig = $twig;
        $this->uriParser = $uriParser;
    }

    public function index()
    {
        echo $this->twig->render('uri/index.twig');
    }

    /**
     * @param $uri
     */
    public function parse($uri)
    {
        $uriInput = new UriInput($uri);

        if (!$uriInput->isValid()) {
            exit($this->twig->render('uri/error.twig', [
                'errors' => $uriInput->getValidationErrors(),
            ]));
        }

        echo $this->twig->render('uri/index.twig', ['Uri' => $this->uriParser->parse($uriInput)]);
    }
}
