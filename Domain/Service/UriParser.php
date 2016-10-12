<?php

namespace Domain\Service;

use Domain\Input\UriInput;
use Domain\Validation\Validator\UriStringValidator;
use Domain\Value\UriValue;

/**
 * Class UriParser
 * @package Domain\Service
 */
class UriParser
{
    /**
     * @var UriStringValidator
     */
    private $validator;

    /**
     * UriParser constructor.
     * @param UriStringValidator $validator
     */
    public function __construct(UriStringValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param UriInput $uriInput
     * @return UriValue
     */
    public function parse(UriInput $uriInput) : UriValue
    {
        $this->validator->validate($uriInput);

        return UriValue::fromString($uriInput);
    }
}
