<?php

namespace Domain\Contract;

abstract class ValidatorAbstract
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param InputInterface $input
     * @return mixed
     */
    abstract public function validate(InputInterface $input) : bool;

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
