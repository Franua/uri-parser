<?php

namespace UriParser\Command;

use Symfony\Component\Console\Output\OutputInterface;
use UriParser\Domain\Input\UriInput;
use UriParser\Domain\Service\UriParserService;

class UriParseCommand
{
    private $uriParser;

    /**
     * UriParseCommand constructor.
     * @param UriParserService $uriParser
     */
    public function __construct(UriParserService $uriParser)
    {
        $this->uriParser = $uriParser;
    }

    /**
     * @param string          $uri
     * @param OutputInterface $output
     * @internal param $id
     */
    public function __invoke(string $uri, OutputInterface $output)
    {
        $uriValue = $this->uriParser->parse(new UriInput($uri));

        if (!$uriValue->isValid()) {
            $output->writeln('Given URI is INVALID');
            return;
        }

        $output->writeln('');
        $output->writeln(sprintf('Scheme: %s', $uriValue->getScheme()));

        $output->writeln('');
        $output->writeln(sprintf('Authority part:'));
        $output->writeln(sprintf('    user: %s', $uriValue->getAuthority()->getUser()));
        $output->writeln(sprintf('    password: %s', $uriValue->getAuthority()->getPassword()));
        $output->writeln(sprintf('    host: %s', $uriValue->getAuthority()->getHost()));

        $port = $uriValue->getAuthority()->getPort();
        $output->writeln(sprintf('    port: %s', $port !== 0 ? $port : ''));

        $output->writeln('');
        $output->writeln(sprintf('Path: %s', $uriValue->getPath()));

        $output->writeln('');
        $output->writeln(sprintf('Query string: %s', $uriValue->getQuery()->getQuery()));
        $output->writeln(sprintf('Query field-value pairs:'));

        $output->writeln('');
        foreach ($uriValue->getQuery()->getValue() as $field => $value) {
            $output->writeln(sprintf('    %s => %s', $field, $value));
        }

        $output->writeln('');
        $output->writeln(sprintf('Fragment: %s', $uriValue->getFragment()));
        $output->writeln('');
    }
}
