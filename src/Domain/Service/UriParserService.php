<?php

namespace UriParser\Domain\Service;

use UriParser\Domain\Input\UriInput;
use UriParser\Domain\Value\UriValue;

/**
 * Class UriParser
 * @package Domain\Service
 */
class UriParserService
{
    /**
     * @param UriInput $uriInput
     * @return UriValue
     */
    public function parse(UriInput $uriInput) : UriValue
    {
        return ($uriInput->isValid())
            ? UriValue::fromString((string) $uriInput)
            : UriValue::createMalformed($uriInput);
    }
}
