<?php

namespace Domain\Value;

/**
 * Class UriValue
 * @package Domain\Value
 */
class UriValue
{
    const DELIMITER_COLON = ':';

    const COMPONENT_SCHEME = 'scheme';
    const COMPONENT_PATH = 'path';
    const COMPONENT_QUERY = 'query';
    const COMPONENT_FRAGMENT = 'fragment';

    /**
     * @var UriSchemeValue
     */
    private $scheme;

    /**
     * @var UriAuthorityValue
     */
    private $authority;

    /**
     * @var string
     */
    private $path;

    /**
     * @var UriQueryValue
     */
    private $query;

    /**
     * @var string
     */
    private $fragment;

    /**
     * UriValue constructor.
     * @param UriSchemeValue    $scheme
     * @param UriAuthorityValue $authority
     * @param string            $path
     * @param UriQueryValue     $query
     * @param string            $fragment
     */
    public function __construct(
        UriSchemeValue $scheme,
        UriAuthorityValue $authority,
        string $path,
        UriQueryValue $query,
        string $fragment
    ) {
        $this->scheme = $scheme;
        $this->authority = $authority;
        $this->path = $path;
        $this->query = $query;
        $this->fragment = $fragment;
    }

    /**
     * @param string $uri
     * @return UriValue
     */
    public static function fromString(string $uri) : self
    {
        $uriComponents = parse_url($uri);

        return new self(
            isset($uriComponents[self::COMPONENT_SCHEME])
                ? new UriSchemeValue($uriComponents[self::COMPONENT_SCHEME])
                : UriSchemeValue::ABSENT(),
            new UriAuthorityValue(
                $uriComponents[UriAuthorityValue::COMPONENT_HOST] ?? '',
                (int) $uriComponents[UriAuthorityValue::COMPONENT_PORT] ?? '',
                $uriComponents[UriAuthorityValue::COMPONENT_USER] ?? '',
                $uriComponents[UriAuthorityValue::COMPONENT_PASS] ?? ''
            ),
            $uriComponents[self::COMPONENT_PATH] ?? '',
            new UriQueryValue($uriComponents[self::COMPONENT_QUERY] ?? ''),
            $uriComponents[self::COMPONENT_FRAGMENT] ?? ''
        );
    }
}
