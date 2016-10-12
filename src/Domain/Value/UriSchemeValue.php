<?php

namespace UriParser\Domain\Value;

use UriParser\Domain\Value\Contract\EnumValue;

/**
 * @method static UriSchemeValue ABSENT()
 * @method static UriSchemeValue HTTP()
 * @method static UriSchemeValue HTTPS()
 * @method static UriSchemeValue FTP()
 * @method static UriSchemeValue MAILTO()
 * @method static UriSchemeValue FILE()
 * @method static UriSchemeValue DATA()
 */
class UriSchemeValue extends EnumValue
{
    const ABSENT = '';
    const HTTP = 'http';
    const HTTPS = 'https';
    const FTP = 'ftp';
    const MAILTO = 'mailto';
    const FILE = 'file';
    const DATA = 'data';

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
