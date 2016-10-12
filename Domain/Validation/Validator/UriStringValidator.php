<?php

namespace Domain\Validation\Validator;

use Domain\Contract\InputInterface;
use Domain\Contract\ValidatorAbstract;

class UriStringValidator extends ValidatorAbstract
{
    /**
     * @param InputInterface $input
     * @return bool
     */
    public function validate(InputInterface $input) : bool
    {
        // TODO: Implement validate() method.

        return true;
    }
}
