<?php

namespace App\Core\MailComposers;

use CodeZero\Mailer\MailComposer;


class UserRegisteredToAdminComposer extends MailComposer
{
    /**
     * @param $user
     * @return \CodeZero\Mailer\Mail
     */
    public function compose($user)
    {
        $toEmail = env('MAIL_FROM');
        $toName = $user->name;
        $subject = 'New User Registered in storecamp!';
        $view = 'emails.welcome-admin';
        $data = ['name' => $user->name, 'email' => $user->email, 'user' => $user];
        $options = null;

        return $this->getMail($toEmail, $toName, $subject, $view, $data, $options);
    }
}