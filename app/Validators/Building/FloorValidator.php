<?php

namespace App\Validators\Building;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class FloorValidator.
 *
 * @package namespace App\Validators\Building;
 */
class FloorValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'building_id' => 'nullable',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'building_id' => 'nullable',
        ],
    ];
}
