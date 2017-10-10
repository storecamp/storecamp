<?php

namespace App\Core\Transformers;

use App\Core\Models\EmailLog;
use League\Fractal\TransformerAbstract;

class MailHistoryTransformer extends TransformerAbstract
{
    /**
     * @param EmailLog $emailLog
     *
     * @return array
     */
    public function transform(EmailLog $emailLog)
    {
        $data = [
            'id'         => $emailLog->id,
            'message_id' => $emailLog->message_id,
            'from'       => $this->presentFrom($emailLog),
            'url'        => route('admin::mail::show', [$emailLog]),
            'reply_to'   => $emailLog->reply_to,
            'cc'         => $emailLog->cc,
            'bcc'        => $emailLog->bcc,
            'to'         => $emailLog->to,
            'subject'    => $emailLog->subject,
            'status'     => $emailLog->status,
            'html'       => $emailLog->html,
            'text'       => $emailLog->text,
            'created_at' => $emailLog->created_at->diffForHumans(),
            'delay_time' => $emailLog->delay_time,
            'recipients' => $emailLog->recipients->toArray(),
            'is_drafted' => $emailLog->is_drafted,
        ];

        return $data;
    }

    /**
     * @param EmailLog $emailLog
     *
     * @return mixed|string
     */
    private function presentFrom(EmailLog $emailLog)
    {
        if ($emailLog->from_name) {
            return $emailLog->from_name.' <'.$emailLog->from.'>';
        } else {
            return $emailLog->from;
        }
    }
}
