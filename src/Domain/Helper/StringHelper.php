<?php

namespace UriParser\Domain\Helper;

class StringHelper
{
    /**
     * @param $value
     * @return bool
     */
    public static function isNullOrEmptyString($value) : bool
    {
        return in_array($value, [null, '']);
    }
}
