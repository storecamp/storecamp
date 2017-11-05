<?php

namespace App\Core\Http\Controllers\Webhooks;

use App\Core\Models\EmailLog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class MailWebhookController
 * @package App\Http\Controllers
 */
class MailWebhookController extends Controller {

    /**
     * @var EmailLog
     */
    public $emailLog;

    /**
     * MailWebhookController constructor.
     * @param EmailLog $emailLog
     */
    public function __construct(EmailLog $emailLog)
    {
        $this->emailLog = $emailLog;
    }

    /**
     * Accept request from webhooks and change status in Email Log record
     *
     * @param Request $request
     * @return bool
     */
    public function notify(Request $request)
    {
        \Log::critical('Email Notification started');
        $dataArr = $request->json()->all();
        foreach ($dataArr as $data) {
            \Log::info(json_encode($data));
            if(isset($data['smtp-id'])) {
                $message_id = preg_replace('/[^A-Za-z0-9.@\-]/', '', $data['smtp-id']);
            }
            $input = [
                "message_id" => isset($data['smtp-id']) ?
                    preg_replace('/[^A-Za-z0-9.@\-]/', '', $data['smtp-id']) : '',
                "email" => isset($data['email']) ? $data['email'] : '',
                "timestamp" => isset($data['timestamp']) ? $data['timestamp'] : '',
                "event" => isset($data['event']) ? $data['event'] : '',
                "userid" => isset($data['userid']) ? $data['userid'] : '',
                "url" => isset($data['url']) ? $data['url'] : '',
                "template" => isset($data['template']) ? $data['template'] : '',
                "useragent" => isset($data['useragent']) ? $data['useragent'] : '',
                "ip" => isset($data['ip']) ? $data['ip'] : '',
                "reason" => isset($data['reason']) ? $data['reason'] : '',
            ];

//        $input = [
//            'message_id' => 'b2bc850d15e36bb26641430e9349b5d2@swift.generated',
//            'event' => 'droppedq12',
//            'ip' => '11.22.11.22',
//            'reason' => 'Some error',
//            'useragent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4',
//            'email' => 'eugene.telyatnik@gmail.com',
//            'timestamp' => '1459178808',
//        ];
            \Log::info('Email Notification performed - ' . json_encode($input));

            if (!is_array($input)
                || !isset($input['message_id'])
                || !isset($input['event'])
                || !isset($input['email']))
            {
                return false;
            }

            $this->emailLog->updateRecipientStatus(
                $input['message_id'], $input['email'], $input['event'],
                $input);

        }
        die('ok');
    }
}
