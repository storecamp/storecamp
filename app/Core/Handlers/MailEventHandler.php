<?php

namespace App\Core\Handlers;

use App\Core\Mappers\MailAddressesMapper;
use App\Core\Models\EmailLog;

class MailEventHandler
{
    /**
     * @return EmailLog
     */
    public function getEmailLog(): EmailLog
    {
        return $this->emailLog;
    }

    /**
     * @var EmailLog
     */
    protected $emailLog;

    /**
     * MailEventHandler constructor.
     * @param EmailLog $emailLog
     */
    public function __construct(EmailLog $emailLog)
    {
        $this->emailLog = $emailLog;
    }

    /**
     * listen to the global mail sent event
     *
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen('Illuminate\Mail\Events\MessageSending', MailEventHandler::class . '@onSending');
    }

    /**
     * @param $emails
     * @return string
     */
    public function originEmailsForTestMetaData($emails): string
    {
        if (is_string($emails)) {
            return $emails;
        }

        if (!is_array($emails)) {
            return '';
        }

        $validatedEmails = [];
        foreach ($emails as $key => $value) {

            $validatedEmails[] = $value ? "$value <$key>" : $key;
        }

        return join(', ', $validatedEmails);
    }

    /**
     * Save email information to logs
     * @param $mailSending
     */
    public function onSending($mailSending)
    {
        $message = $mailSending->message;
        try {
            list($from, $fromName) = MailEventHandler::getFromAddresses($message);

            //prepare message data
            $data = [
                'from' => $from,
                'fromName' => $fromName,
                'message_id' => $message->getId(),
                'subject' => $message->getSubject(),
                'reply_to' => MailEventHandler::getReplyTo($message),
                'html' => $message->getBody(),
                'text' => $this->getText($message)
            ];

            $recipients = MailEventHandler::getRecipients($message);

            $this->emailLog->createLog($data, $recipients);

        } catch (\Exception $e) {
            \Log::error($e);
        }
    }


    /**
     * Set text contents.
     * @param $message
     * @return string
     */
    protected function getText($message)
    {
        foreach ($message->getChildren() as $attachment) {
            if (!$attachment instanceof \Swift_MimePart) {
                continue;
            }
            return $attachment->getBody();
        }
    }

    /**
     * @param $message
     * @return array
     */
    public static function getRecipients($message): array
    {
        $result = [];
        if ($message instanceof \Swift_Message) {

            if ($list = $message->getTo()) {
                self::addRecipients($result, $list, 'to');
            }

            if ($list = $message->getCc()) {
                self::addRecipients($result, $list, 'cc');
            }

            if ($list = $message->getBcc()) {
                self::addRecipients($result, $list, 'bcc');
            }
        }

        if (is_array($message)) {

            if ($list = !empty($message['to']) ? $message['to'] : null) {
                self::addRecipients($result, $list, 'to');
            }

            if ($list = !empty($message['cc']) ? $message['cc'] : null) {
                self::addRecipients($result, $list, 'cc');
            }

            if ($list = !empty($message['bcc']) ? $message['bcc'] : null) {
                self::addRecipients($result, $list, 'bcc');
            }
        }

        return $result;
    }

    /**
     * Add recipients to the
     * @param $result
     * @param $list
     * @param $type
     */
    public static function addRecipients(Array &$result, $list, $type)
    {
        $mails = MailAddressesMapper::map($list);
        foreach ($mails as $mail) {
            $data = [
                'email' => $mail["address"],
                'name' => $mail["name"],
                'type' => $type,
            ];
            $result[] = $data;
        }
    }

    /**
     * @param \Swift_Message $message
     * @return mixed|null
     */
    public static function getReplyTo($message)
    {
        $result = null;
        if ($message instanceof \Swift_Message) {
            if ($list = $message->getReplyTo()) {
                $first = current(array_keys($list));
                $result = $first;
            }
        }
        if (is_array($message)) {
            if ($list = !empty($message['reply_to']) ? $message['reply_to'] : null) {
                $first = current(array_keys($list));
                $result = $first;
            } else {
                $result = config('mail.store_admin', 'storecamp_admin');
            }
        }
        return $result;
    }

    /**
     * Get From Addresses.
     *
     * @param \Swift_Message $message
     * @return array
     */
    public static function getFromAddresses($message): array
    {
        if ($message instanceof \Swift_Message) {
            if ($message->getFrom()) {
                foreach ($message->getFrom() as $address => $name) {
                    return [$address, $name];
                }
            }
        }

        if (is_array($message)) {
            if (!empty($message['from'])) {
                if (is_string($message['from'])) {
                    return [$message['from'], ''];
                }
                foreach ($message['from'] as $address => $name) {
                    return [$address, $name];
                }
            } else {
                return [config('mail.from.address'), config('mail.from.name')];
            }
        }

        return [];
    }
}