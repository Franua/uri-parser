<?php

namespace UriParser\Domain\Input;

use UriParser\Domain\Contract\InputAbstract;

class UriInput extends InputAbstract
{
    /**
     * @var string
     */
    private $uri;

    /**
     * UriInput constructor.
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return bool
     */
    public function isValid() : bool
    {
        // TODO: Implement validate() method.

        return true;
    }
}
