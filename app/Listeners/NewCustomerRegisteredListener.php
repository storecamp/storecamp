<?php

namespace App\Listeners;

use App\Events\NewCustomerRegistered;
use App\Core\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Core\MailComposers\UserRegisteredToAdminComposer;
use App\Core\MailComposers\WelcomeMailComposer;

class NewCustomerRegisteredListener
{
    /**
     * send email to user and admin just get to know that new user registered
     *
     * NewCustomerRegisteredListener constructor.
     * @param WelcomeMailComposer $mailer
     * @param UserRegisteredToAdminComposer $adminComposer
     */
    public function __construct(WelcomeMailComposer $mailer, UserRegisteredToAdminComposer $adminComposer)
    {
        $this->mailer = $mailer;
        $this->adminComposer = $adminComposer;
    }

    /**
     * @param NewCustomerRegistered $event
     */
    public function handle(NewCustomerRegistered $event)
    {

        $user = User::find($event->user->id);
        $this->mailer->compose($user->email, $user->name)->send();
        $this->adminComposer->compose($user)->send();
    }

}
