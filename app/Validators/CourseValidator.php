<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CourseValidator.
 *
 * @package namespace App\Validators;
 */
class CourseValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'user_id' => 'required|exists:users,id',
            'instituition_id' => 'required|exists:instituitions,id'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
