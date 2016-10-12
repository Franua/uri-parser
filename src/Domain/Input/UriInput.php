<?php

namespace UriParser\Domain\Input;

use UriParser\Domain\Contract\InputAbstract;
use UriParser\Domain\Contract\PrintableInterface;

final class UriInput extends InputAbstract implements PrintableInterface
{
    /**
     * Regular expression is pulled from https://mathiasbynens.be/demo/url-regex
     * @diegoperini's version
     */
    const URI_CORRECTNESS_REGEX_RULE = '/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/ius';

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
        return preg_match(self::URI_CORRECTNESS_REGEX_RULE, $this->uri);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getUri();
    }
}
