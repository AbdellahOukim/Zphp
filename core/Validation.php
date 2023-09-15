<?php

namespace app\core;

class Validation
{
    public const REQUIRED = 'required';
    public array $errors = [];


    public function Errorsmessages($attribute)
    {

        return [
            'required' => "the $attribute field is required !"
        ];
    }

    public function validation($data, $rules)
    {
        foreach ($rules as $attribute => $rulearray) {
            $value = $data[$attribute];

            foreach ($rulearray as $rule) {
                if ($rule === self::REQUIRED && !$value) {
                    $this->errors[$attribute] = $this->Errorsmessages($attribute)[self::REQUIRED];
                }
            }
        }



        return $this->errors;
    }
}
