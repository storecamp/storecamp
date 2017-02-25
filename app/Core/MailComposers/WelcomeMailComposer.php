<?php

namespace App\Core\MailComposers;

use CodeZero\Mailer\MailComposer;
use App\Core\Models\Product;

class WelcomeMailComposer extends MailComposer
{

    /**
     * @param $email
     * @param $name
     * @return \CodeZero\Mailer\Mail
     */
    public function compose($email, $name)
    {
        $products = Product::take(5)->get();
        $toEmail = $email;
        $toName = $name;
        $subject = 'Welcome!';
        $view = 'emails.welcome-customer';
        $data = ['name' => $name, 'products' => $products, 'products_url' => url('/products')];
        $options = null;

        return $this->getMail($toEmail, $toName, $subject, $view, $data, $options);
    }

}