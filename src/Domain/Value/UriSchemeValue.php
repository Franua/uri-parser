<?php

namespace UriParser\Domain\Value;

/**
 * @method static UriSchemeValue ABSENT()
 * @method static UriSchemeValue HTTP()
 * @method static UriSchemeValue HTTPS()
 * @method static UriSchemeValue FTP()
 * @method static UriSchemeValue MAILTO()
 * @method static UriSchemeValue FILE()
 * @method static UriSchemeValue DATA()
 */
class UriSchemeValue
{
    const ABSENT = '';
    const HTTP = 'http';
    const HTTPS = 'https';
    const FTP = 'ftp';
    const MAILTO = 'mailto';
    const FILE = 'file';
    const DATA = 'data';
}
