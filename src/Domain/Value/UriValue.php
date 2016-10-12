<?php

namespace UriParser\Domain\Value;

use UriParser\Domain\Helper\StringHelper;
use UriParser\Domain\Value\Contract\ValueObjectInterface;

/**
 * Class UriValue
 * @package Domain\Value
 */
final class UriValue implements ValueObjectInterface
{
    const DELIMITER_COLON = ':';

    const COMPONENT_SCHEME = 'scheme';
    const COMPONENT_PATH = 'path';
    const COMPONENT_QUERY = 'query';
    const COMPONENT_FRAGMENT = 'fragment';

    const PREFIX_FRAGMENT = '#';

    /**
     * @var string
     */
    private $uri;

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
     * @var bool
     */
    private $valid = true;

    /**
     * UriValue constructor.
     */
    private function __construct()
    {
    }

    /**
     * UriValue constructor.
     * @param UriSchemeValue    $scheme
     * @param UriAuthorityValue $authority
     * @param string            $path
     * @param UriQueryValue     $query
     * @param string            $fragment
     * @return UriValue
     */
    public static function fromValues(
        UriSchemeValue $scheme,
        UriAuthorityValue $authority,
        string $path,
        UriQueryValue $query,
        string $fragment
    ) : self {
        $self = new self;

        $self->scheme = $scheme;
        $self->authority = $authority;
        $self->path = $path;
        $self->query = $query;
        $self->fragment = $fragment;
        $self->uri = $self->buildUri();

        return $self;
    }

    /**
     * @param string $uri
     * @return UriValue
     */
    public static function fromString(string $uri) : self
    {
        $uriComponents = parse_url($uri);

        return self::fromValues(
            isset($uriComponents[self::COMPONENT_SCHEME])
                ? new UriSchemeValue($uriComponents[self::COMPONENT_SCHEME])
                : UriSchemeValue::ABSENT(),
            new UriAuthorityValue(
                $uriComponents[UriAuthorityValue::COMPONENT_HOST] ?? '',
                $uriComponents[UriAuthorityValue::COMPONENT_PORT] ?? 0,
                $uriComponents[UriAuthorityValue::COMPONENT_USER] ?? '',
                $uriComponents[UriAuthorityValue::COMPONENT_PASS] ?? ''
            ),
            $uriComponents[self::COMPONENT_PATH] ?? '',
            new UriQueryValue($uriComponents[self::COMPONENT_QUERY] ?? ''),
            $uriComponents[self::COMPONENT_FRAGMENT] ?? ''
        );
    }

    /**
     * @param string $uri
     * @return UriValue
     */
    public static function createMalformed(string $uri) : self
    {
        $self = new self;

        $self->uri = $uri;
        $self->valid = false;

        return $self;
    }

    /**
     * @return UriSchemeValue
     */
    public function getScheme(): UriSchemeValue
    {
        return $this->scheme;
    }

    /**
     * @return UriAuthorityValue
     */
    public function getAuthority(): UriAuthorityValue
    {
        return $this->authority;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return UriQueryValue
     */
    public function getQuery(): UriQueryValue
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function getFragment(): string
    {
        return $this->fragment;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return boolean
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return ($this->uri === null) ? $this->buildUri() : $this->uri;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function buildUri()
    {
        $uri = (string) $this->scheme;

        if ($uri !== '') {
            $uri .= UriValue::DELIMITER_COLON;
        }

        $uri .= $this->authority . $this->path;

        if ($this->query instanceof UriQueryValue && $this->query->getQuery() !== '') {
            $uri .= UriQueryValue::PREFIX . $this->query;
        }

        if (!StringHelper::isNullOrEmptyString($this->fragment)) {
            $uri .= self::PREFIX_FRAGMENT . $this->fragment;
        }

        return $uri;
    }
}
