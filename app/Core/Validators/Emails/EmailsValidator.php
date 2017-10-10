<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 9/24/2017
 * Time: 11:38 PM.
 */

namespace App\Core\Validators\Emails;

use Illuminate\Support\Facades\Validator;

/**
 * Class EmailsValidator.
 */
class EmailsValidator
{
    /**
     * @param array $data
     * @param array $rules
     *
     * @throws \Exception
     */
    public static function validate(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            throw new \Exception(implode(' ', $validator->errors()->all()));
        }
    }

    /**
     * @param array $IDs
     *
     * @return bool
     */
    public static function validateIDs(array $IDs)
    {
        $rule = ['id' => 'required|integer'];
        foreach ($IDs as $id) {
            self::validate(['id' => $id], $rule);
        }

        return false;
    }

    /**
     * @param $email
     */
    public static function validateEmail($email)
    {
        $rules = [
            'email' => 'required|email',
        ];

        self::validate(['email' => $email], $rules);
    }
}
