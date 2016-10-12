<?php

namespace UriParser\Domain\Value\Contract;

interface ValueObjectInterface
{
    public function getValue();

    public function __toString();
}
