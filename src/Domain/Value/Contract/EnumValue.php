<?php

namespace UriParser\Domain\Value\Contract;

abstract class EnumValue extends SimpleValue
{
    /**
     * Returns the value object when called statically:
     * MyEnum::SOME_VALUE(), given SOME_VALUE is a class constant.
     * @param string $name
     * @param        $arguments
     * @return static
     */
    public static function __callStatic(string $name, $arguments)
    {
        $constant = sprintf('static::%s', $name);

        if (!defined($constant)) {
            throw new \BadMethodCallException(
                sprintf(
                    'Enum constant "%s" is not defined in class %s',
                    $name,
                    get_called_class()
                )
            );
        }

        return new static(constant($constant));
    }

    /**
     * Enum constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!in_array($value, static::values())) {
            throw new \InvalidArgumentException(
                sprintf('Value "%s" is not a part of the enum %s', $value, get_called_class())
            );
        }

        parent::__construct($value);
    }

    /**
     * @return array
     */
    final public static function values()
    {
        $reflected = new \ReflectionClass(static::class);

        return $reflected->getConstants();
    }
}
