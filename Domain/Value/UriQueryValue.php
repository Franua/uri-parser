<?php

namespace Domain\Value;

use Domain\Value\Contract\ValueObjectInterface;

final class UriQueryValue implements ValueObjectInterface
{
    const DELIMITER_AMPERSAND = '&';
    const DELIMITER_SEMICOLON = ';';
    const DELIMITER_FIELD_VALUE_PAIR = '=';

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
//    private $delimiter = self::DELIMITER_AMPERSAND;

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
    public function __toString()
    {
        return $this->query;
    }

//    /**
//     * @return UriQueryValue
//     */
//    public function setDelimiterAmpersand() : self
//    {
//        $this->delimiter = self::DELIMITER_AMPERSAND;
//
//        return $this;
//    }
//
//    /**
//     * @return UriQueryValue
//     */
//    public function setDelimiterSemicolon() : self
//    {
//        $this->delimiter = self::DELIMITER_SEMICOLON;
//
//        return $this;
//    }
//
//    /**
//     * @param string $fieldValuePair
//     * @return array
//     */
//    private function parseFieldValuePair(string $fieldValuePair, string $delimiter) : array
//    {
//        $fieldValueArr = explode($delimiter, $fieldValuePair, 2);
//
//        if (count($fieldValueArr) === 1) {
//            array_push($fieldValueArr, null);
//        }
//
//        return $fieldValueArr;
//    }
}
