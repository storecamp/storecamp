<?php

namespace App\Core\Repositories;

use App\Core\Support\Email\EmailCustomization;

use App\Core\Handlers\MailEventHandler;
use App\Mail\DeliverMail;
use App\Core\Mappers\MailAddressesMapper;
use App\Core\Validators\Emails\EmailsValidator;
use Carbon\Carbon;
/**
 * Class MailRepositoryEloquent.
 */
class MailRepositoryEloquent implements MailRepository
{

    /**
     * Array for the delayed sending of emails
     *
     * @var array
     */
    public static $emailsDelayedStack = [];

    /**
     *
     * @param array $data [
     *    'template'    => 'emails.template_name',
     *    'to'          => ['email@store.com' , 'Person Name'],
     *    'subject'     => 'Subject',
     *    'reply'       => ['email@store.com' , 'Person Name'],
     *    'bcc'         => ['email@store.com' , 'Person Name'],
     *    'cc'          => ['email@store.com' , 'Person Name'],
     *    'data'        => ['key' => 'value', ...],
     *    'attachments' => [['filename' => '/dir/users.csv'(, 'as' => 'Users.csv' optional)], ...],
     * ];*
     * @param bool $async
     */
    public function send(array $data, $async = false)
    {
        try {
            $data['to'] = isset($data['to']) ? self::validateInputEmails($data['to']) : [];
            $data['cc'] = isset($data['cc']) ? self::validateInputEmails($data['cc']) : [];
            $data['bcc'] = isset($data['bcc']) ? self::validateInputEmails($data['bcc']) : [];
            $data['reply'] = isset($data['reply']) ? self::validateInputEmails($data['reply']) : [];

            if (empty($data['to'])) {
                throw new \Exception('To property for mail not provided. Please provide it.', 422);
            }
            $mailData = new DeliverMail($data);
            if (!empty($data['delay_time']) || !empty($data['drafted'])) {
                $this->saveDelayed($data);
            } else {
                if ($async) {
                    \Mail::queue($mailData);
                    \Log::info('Mail Sent to queue');
                } else {
                    \Mail::send($mailData);
                    \Log::info('Mail Sent');
                }
            }
        } catch (\Throwable $e) {
            \Log::error('Send Mail Fail', $e->getTrace());
        }
    }

    /**
     * @param array $data [
     *    'template'    => 'emails.template_name',
     *    'to'          => 'email@store.com' | ['email@store.com' => 'Person Name', 'email@store.com', ...],
     *    'subject'     => 'Subject',
     *    'reply'       => 'email@store.com' | ['email@store.com' => 'Person Name', 'email@store.com', ...],
     *    'bcc'         => 'email@store.com' | ['email@store.com' => 'Person Name', 'email@store.com', ...],
     *    'cc'          => 'email@store.com' | ['email@store.com' => 'Person Name', 'email@store.com', ...],
     *    'data'        => ['key' => 'value', ...],
     *    'attachments' => [['filename' => '/dir/users.csv'(, 'as' => 'Users.csv' optional)], ...],
     * ];
     */
    public function sendAsync(array $data)
    {
        try {
            \Log::info(json_encode($data));
            $this->send($data, true);
        } catch (\Exception $e) {
            \Log::error($e->getTraceAsString());
        }
    }

    /**
     * @param array $mailData
     */
    public function sendCampaign(array $mailData)
    {
        try {
            if (empty($mailData)) {
                throw new \Exception('Please provide data for mail campaign');
            }
            foreach ($mailData as $mail) {
                if (!is_array($mail)) {
                    self::pushToDelayedStack($mailData);
                    $this->sendDelayedEmails(true);
                    return;
                }
                self::pushToDelayedStack($mail);
            }
            $this->sendDelayedEmails(true);
        } catch (\Exception $e) {
            \Log::error($e->getTraceAsString());
        }
    }

    /**
     * @param $emails
     * @return array|string
     * @throws \Exception
     */
    public static function validateInputEmails($emails)
    {
        if (is_string($emails)) {
            EmailsValidator::validateEmail($emails);
            return !self::isIgnoredEmail($emails) ? $emails : [];
        }

        if (!is_array($emails)) {
            throw new \Exception('Not valid argument EMAILS');
        }

        $validatedEmails = [];
        foreach (MailAddressesMapper::map($emails) as $mail) {
            if (!self::isIgnoredEmail($mail['address'])) {
                EmailsValidator::validateEmail($mail['address']);
                $data = [
                    'email' => $mail["address"],
                    'name' => $mail["name"]
                ];
                $validatedEmails[] = $data;
            }
        }

        return $emails;
    }

    /**
     * @param string $dateTime
     * @return string
     */
    public function createDateTimeStringForMail($dateTime)
    {
        $carbonObj = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime);

        return $carbonObj->format('m/d/Y \\a\\t h:iA');
    }

    /**
     * @param array $emailData
     */
    public static function pushToDelayedStack(array $emailData)
    {
        self::$emailsDelayedStack[] = $emailData;
    }

    /**
     * @param bool $async
     */
    public static function sendDelayedEmails($async = true)
    {
        $mailRepo = app(MailRepository::class);
        $method = $async ? 'sendAsync' : 'send';

        foreach (self::$emailsDelayedStack as $emailData) {
            $mailRepo->$method($emailData);
        }
        self::clearDelayedStack();
    }

    /**
     *
     */
    public static function clearDelayedStack()
    {
        self::$emailsDelayedStack = [];
    }

    /**
     * @return array
     */
    public static function getIgnoredEmails()
    {
        return EmailCustomization::getIgnoredEmails();
    }

    /**
     * @param array $emails
     * @return array
     */
    public static function getNotIgnoredEmails(array $emails)
    {
        $ignoredEmails = self::getIgnoredEmails();
        $return = [];

        foreach ($emails as $email) {
            !in_array($email, $ignoredEmails) && $return[] = $email;
        }

        return $return;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function isIgnoredEmail($email)
    {
        return in_array($email, self::getIgnoredEmails());
    }

    /** store email fro delay
     * @param $message
     */
    public function saveDelayed($message)
    {
        try {
            list($from, $fromName) = MailEventHandler::getFromAddresses($message);

            //prepare message data
            $data = [
                'from' => $from,
                'fromName' => $fromName,
                'message_id' => '',
                'subject' => $message['subject'],
                'reply_to' => MailEventHandler::getReplyTo($message),
                'html' => $message['body'],
                'text' => isset($message['text']) ? $message['text'] : '',
            ];

            if(isset($message['delay_time'])) {
                $data['delay_time'] = $message['delay_time'];
            }

            if(isset($message['drafted']) && $message['drafted']) {
                $data['is_drafted'] = true;
                $data['status'] = 'pending';
            }

            $recipients = MailEventHandler::getRecipients($message);
            if(!empty($message['id'])) {
                $data['id'] = $message['id'];
                $emailLogRepository = app(EmailLogRepository::class);
                $emailLogRepository->update($data, $recipients);
            } else {
                $emailLogRepository = app(EmailLogRepository::class);
                $emailLogRepository->create($data, $recipients);
            }
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }
}
