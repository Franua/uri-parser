<?php

namespace UriParser\Domain\Value;

use UriParser\Domain\Value\Contract\ValueObjectInterface;

final class UriQueryValue implements ValueObjectInterface
{
    const PREFIX = '?';
    const DELIMITER_AMPERSAND = '&';
    const DELIMITER_SEMICOLON = ';';
    const DELIMITER_FIELD_VALUE_PAIR = '=';

    /**
     * @var string
     */
    private $query;

    /**
     * UriQueryValue constructor.
     * @param string $query
     */
    public function __construct(string $query)
    {
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function getValue() : array
    {
        parse_str($this->query, $fieldValuePairs);

        return $fieldValuePairs;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->query;
    }
}
