<?php

namespace UriParser\Domain\Value\Contract;

use UriParser\Domain\Contract\PrintableInterface;

interface ValueObjectInterface extends PrintableInterface
{
    /**
     * @return mixed
     */
    public function getValue();
}
