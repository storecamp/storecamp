<?php

namespace App\Mail;

use App\Core\Mappers\MailAddressesMapper;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeliverMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    private $data;

    /**
     * DeliverMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->data['subject']);

        if (!empty($this->data['from'])) {
            $mails = MailAddressesMapper::map($this->data['from']);
            foreach ($mails as $mail) {
                $this->from($mail['address'], $mail['name']);
            }
        }

        if (!empty($this->data['to'])) {
            $mails = MailAddressesMapper::map($this->data['to']);
            foreach ($mails as $mail) {
                $this->to($mail['address'], $mail['name']);
            }
        }
        if (!empty($this->data['reply'])) {
            $mails = MailAddressesMapper::map($this->data['reply']);
            foreach ($mails as $mail) {
                $this->replyTo($mail['address'], $mail['name']);
            }
        } else {
            $this->replyTo(
                config('mail.store_admin'), 'store_admin');
        }
        if (!empty($this->data['bcc'])) {
            $mails = MailAddressesMapper::map($this->data['bcc']);
            foreach ($mails as $mail) {
                $this->bcc($mail['address'], $mail['name']);
            }
        }
        if (!empty($this->data['cc'])) {
            $mails = MailAddressesMapper::map($this->data['cc']);
            foreach ($mails as $mail) {
                $this->cc($mail['address'], $mail['name']);
            }
        }
        if (!empty($this->data['attachments'])) {
            foreach ($this->data['attachments'] as $attachment) {
                \File::exists($attachment['filename']) && $this->attach(
                    $attachment['filename'], [
                        'as' => !empty($attachment['as']) ? $attachment['as'] : pathinfo($attachment['filename'], PATHINFO_BASENAME),
                        'mime' => mime_content_type($attachment['filename'])
                    ]
                );
            }
        }

        $data = [
            'to' => $this->data['to'],
            'subject' => $this->data['subject'],
            'message' => !empty($this->data['message']) ? $this->data['message'] : '',
        ];
        if (!empty($this->data['id'])) {
            $data = $this->data['id'];
        }
        if (!empty($this->data['body'])) {
            $body = $this->data['body'];
        } else {
            $body = '';
        }

        if (!empty($this->data['data'])) {
            $data = array_merge($data, $this->data['data']);
        }
        if (!empty($this->data['html'])) {
            return $this->view('admin.mail.rebuild', compact('html', 'data', 'body'));
        } else {
            return $this->view($this->data['template'], compact('data', 'body'));
        }

    }
}
