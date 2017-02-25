<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Mail\Mailer;

/**
 * Class SendCampaignEmails
 * @package App\Jobs
 */
class SendCampaignEmails extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected
        $urlhelper,
        $mailer,
        $view,
        $subject,
        $receiverEmail,
        $senderEmail,
        $senderName = null,
        $name = null,
        $filepath = null;

    /**
     * SendCampaignEmails constructor.
     * @param $view
     * @param $subject
     * @param $receiverEmail
     * @param $senderEmail
     * @param null $senderName
     * @param null $name
     * @param null $filepath
     */
    public function __construct($view, $subject, $receiverEmail, $senderEmail, $senderName = null, $name = null, $filepath = null)
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->receiverEmail = $receiverEmail;
        $this->senderEmail = $senderEmail;
        $this->senderName = $senderName;
        $this->name = $name;
        $this->filepath = $filepath;
    }

    /**
     * @param UrlGenerator $urlhelper
     * @param Mailer $mailer
     */
    public function handle(UrlGenerator $urlhelper, Mailer $mailer)
    {
        $receiverEmail = $this->receiverEmail;
        $subject = $this->subject;
        $senderEmail = $this->senderEmail;
        $senderName = $this->senderName;
        $filepath = $this->filepath;
        $urlhelper->forceRootUrl(config('app.url'));
        $mailer->queue($this->view,
            ['name' => $this->name, 'receiverEmail' => $receiverEmail, 'subject' => $subject,
                'senderName' => $senderName],
            function ($m) use ($receiverEmail, $subject, $senderEmail, $senderName, $filepath) {
                $m->to($receiverEmail)->subject($subject);
                $m->from($senderEmail, $senderName);
                if ($filepath) {
                    $m->attach($filepath);
                }
            });
    }
}
