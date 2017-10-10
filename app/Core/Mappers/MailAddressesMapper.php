<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 9/24/2017
 * Time: 11:33 PM.
 */

namespace App\Core\Mappers;

class MailAddressesMapper
{
    public static function map($address)
    {
        $addresses = [];
        if (is_array($address)) {
            foreach ($address as $key => $value) {
                $name = '';
                $email = '';
                if (is_string($key)) {
                    $email = $key;
                    if (!empty($value) && is_string($value)) {
                        $name = $value;
                    }
                }
                if (!is_array($value) && !empty($value)) {
                    $email = $value;
                } else {
                    if (!empty($value) && !is_int($value)) {
                        foreach ($value as $key2 => $value2) {
                            if (is_int($key2)) {
                                $email = isset($value[0]) ? $value[0] : '';
                                $name = isset($value[1]) ? $value[1] : '';
                            }
                            if (is_string($key2)) {
                                $email = isset($key2) ? $key2 : '';
                                $name = isset($value2) ? $value2 : '';
                            }
                        }
                    }
                }

                $addresses[] = ['address' => $email, 'name' => $name];
            }
        } else {
            $addresses[] = ['address' => $address, 'name' => ''];
        }

        return $addresses;
    }
}
