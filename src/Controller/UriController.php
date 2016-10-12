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

    public function parse()
    {
        $uri = $_POST['uri'] ?? '';
        $uriValue = $this->uriParser->parse(new UriInput($uri));

        echo $this->twig->render('uri/index.twig', ['Uri' => $uriValue]);
    }
}
