<?php

namespace Domain\Value;

use Domain\Value\Contract\ValueObjectInterface;

final class UriAuthorityValue implements ValueObjectInterface
{
    const PREFIX = '//';
    const DELIMITER_AT = '@';
    const MAX_PORT_NUMBER = 65535;

    const COMPONENT_HOST = 'host';
    const COMPONENT_PORT = 'port';
    const COMPONENT_USER = 'user';
    const COMPONENT_PASS = 'pass';

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * UriAuthorityValue constructor.
     * @param string $host
     * @param int    $port
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, int $port = 0, string $user = '', string $password = '')
    {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        $authorityString = '';

        if ($this->isNotEmpty($this->user)) {
            $authorityString = $this->user;
            if ($this->isNotEmpty($this->password)) {
                $authorityString .= UriValue::DELIMITER_COLON . $this->password;
            }
        }

        $authorityString .= $this->host;
        if ($authorityString !== '' && $this->port > 0 && $this->port <= self::MAX_PORT_NUMBER) {
            $authorityString .= self::DELIMITER_AT . $this->port;
        }

        return self::PREFIX . $authorityString;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @param $value
     * @return bool
     */
    private function isNotEmpty($value) : bool
    {
        return !in_array($value, [null, '']);
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }
}
