<?php

namespace App\Validators;

use App\Models\Auth;
use Illuminate\Support\MessageBag;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TagValidator.
 *
 * @package namespace App\Validators;
 */
class TagValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|string',
            'alias' => 'nullable|required_if:parent_id,0|alpha_num',
            'parent_id' => 'required|numeric',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|string',
        ],
    ];

    public function passes($action = null)
    {

        $rules      = $this->getRules($action);
        $messages   = $this->getMessages();
        $attributes = $this->getAttributes();
        $validator  = $this->validator->make($this->data, $rules, $messages, $attributes);

        if($action === ValidatorInterface::RULE_CREATE){
            if(!$this->canCreate($this->data)) {
                $this->errors = new MessageBag(['error'=>'数据添加有误 或者 非管理员不得添加自定义标签类']);
                return false;
            }
        }
        else {
            if(!$this->canUpdate($this->data)) {
                $this->errors = new MessageBag(['error'=>$this->data]);
                return false;
            }
        }

        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    public function canCreate($attributes)
    {

        return ($attributes['parent_id'] == 0 && isset($attributes['alias']))||
            ($attributes['parent_id'] !=0 && is_null($attributes['alias'])) ;
    }

    public function canUpdate($attributes)
    {
        return !key_exists('parent_id',$attributes) &&
            !key_exists('user_id',$attributes) &&
            !key_exists('alias',$attributes);
    }

}
