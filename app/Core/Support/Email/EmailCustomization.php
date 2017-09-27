<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 9/24/2017
 * Time: 11:41 PM
 */

namespace App\Core\Support\Email;


class EmailCustomization
{
    /**
     * Lists mails to be removed from the to/bcc/cc list
     * done for dummy users that do not have real emails
     *
     * @return array
     */
    public static function getIgnoredEmails()
    {
        return [];
    }
}