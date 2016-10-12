<?php

namespace UriParser\Domain\Contract;

abstract class InputAbstract
{
    /**
     * @var array
     */
    protected $validationErrors = [];

    /**
     * @return bool
     */
    abstract public function isValid() : bool;

    /**
     * @return array
     */
    public function getValidationErrors() : array
    {
        return $this->validationErrors;
    }
}
