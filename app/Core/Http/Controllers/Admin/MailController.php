<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\EmailLog;
use App\Core\Models\EmailLogRecipient;
use App\Core\Support\Mail\MailSupport;
use App\Core\Transformers\MailHistoryTransformer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class MailController.
 */
class MailController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'admin.mail.';

    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/mail/index';

    /**
     * @var EmailLog
     */
    private $emailLog;
    /**
     * @var EmailLogRecipient
     */
    private $emailLogRecipient;
    /**
     * @var MailSupport
     */
    private $mailSupport;

    /**
     * MailController constructor.
     * @param EmailLog $emailLog
     * @param EmailLogRecipient $emailLogRecipient
     * @param MailSupport $mailSupport
     */
    public function __construct(EmailLog $emailLog,
                                EmailLogRecipient $emailLogRecipient,
                                MailSupport $mailSupport)
    {
        $this->emailLog = $emailLog;
        $this->emailLogRecipient = $emailLogRecipient;
        $this->mailSupport = $mailSupport;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $mails = $this->emailLog->simplePaginate();
        $total = $this->emailLog->count();
        $no = $mails->firstItem();

        return $this->view('index', compact('mails', 'no', 'total'));
    }

    /**
     * @param DataTables $datatables
     * @return mixed
     */
    public function history(DataTables $datatables)
    {
        $query = EmailLog::select('*');
        return $datatables->eloquent($query)
            ->setTransformer(new MailHistoryTransformer())
            ->make(true);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $mail = $this->emailLog->find($id);
        $total = $this->emailLog->count();
        // get previous mail id
        $previous = $this->emailLog->where('id', '<', $mail->id)->max('id');
        // get next mail id
        $next = $this->emailLog->where('id', '>', $mail->id)->min('id');

        return $this->view('show', compact('mail', 'total', 'previous', 'next'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFrame(Request $request)
    {
        $mail = new EmailLog();

        return $this->view('frame', compact('mail'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $mail = new EmailLog();

        return $this->view('create', compact('mail'));
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function save(Request $request)
    {

        $map = [
            'subject' => $request->get('subject'),
            'to' => $request->get('to'),
            'body' => $request->get('body'),
            'bcc' => $request->get('bcc'),
            'cc' => $request->get('cc'),
            'from' => $request->get('from'),
            'reply_to' => $request->get('reply_to'),
            'delay_time' => $request->get('delay_time'),
            'id' => $request->get('id')
        ];
        if ($map['delay_time']) {
            $validationArr = [
                'subject' => 'required',
                'body' => 'required',
            ];
            if (!empty($map['cc'])) {
                $validationArr['cc'] = 'array';
            }
            if (!empty($map['bcc'])) {
                $validationArr['bcc'] = 'array';
            }
            if (!empty($map['from'])) {
                $validationArr['from'] = 'email';
            }
            try {
                \DB::beginTransaction();
                $validator = \Validator::make($map, $validationArr);
                if ($validator->fails()) {
                    throw new \Exception(join(' ', $validator->errors()->all()));
                }
                $failures = \Mail::failures();
                if ($failures) {
                    return response()->json(['error' => $failures], 500);
                }
                $this->sendMail($map);
                \DB::commit();
                return response()->json(['ok']);
            } catch (\Exception $exception) {
                \DB::rollBack();
                return response()->json(['error' => 'Mail Not sent! Server msg: ' . $exception->getMessage()],
                    $exception->getCode());
            } catch (\Throwable $exception) {
                \DB::rollBack();
                return response()->json(['error' => 'Mail Not sent. Code - ' . $exception->getCode()],
                    $exception->getCode());
            }
        } else {
            return response()->json(['error' => 'Mail Not sent'], 500);
        }
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function saveAsNew(Request $request)
    {
        $map = [
            'subject' => $request->get('subject'),
            'to' => $request->get('to'),
            'body' => $request->get('body'),
            'bcc' => $request->get('bcc'),
            'cc' => $request->get('cc'),
            'from' => $request->get('from'),
            'reply_to' => $request->get('reply_to'),
            'delay_time' => $request->get('delay_time')
        ];

        $map['drafted'] = true;
        $validationArr = [
            'subject' => 'required',
            'body' => 'required',
        ];
        if (!empty($map['cc'])) {
            $validationArr['cc'] = 'array';
        }
        if (!empty($map['bcc'])) {
            $validationArr['bcc'] = 'array';
        }
        if (!empty($map['from'])) {
            $validationArr['from'] = 'email';
        }

        $validator = \Validator::make($map, $validationArr);
        if ($validator->fails()) {
            throw new \Exception(join(' ', $validator->errors()->all()));
        }
        try {
            \DB::beginTransaction();
            $this->sendMail($map);
            \DB::commit();
            return response()->json(['ok']);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ['error', ['Mail Not sent']];
        } catch (\Throwable $exception) {
            \DB::rollBack();
            return ['error', ['Mail Not sent. Code - ' . $exception->getCode()]];
        }
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function saveAsNewAndResend(Request $request)
    {
        $map = [
            'subject' => $request->get('subject'),
            'to' => $request->get('to'),
            'body' => $request->get('body'),
            'bcc' => $request->get('bcc'),
            'cc' => $request->get('cc'),
            'from' => $request->get('from'),
            'reply_to' => $request->get('reply_to'),
            'delay_time' => $request->get('delay_time')
        ];

        $validationArr = [
            'subject' => 'required',
            'body' => 'required',
        ];
        if (!empty($map['cc'])) {
            $validationArr['cc'] = 'array';
        }
        if (!empty($map['bcc'])) {
            $validationArr['bcc'] = 'array';
        }
        if (!empty($map['from'])) {
            $validationArr['from'] = 'email';
        }

        $validator = \Validator::make($map, $validationArr);
        if ($validator->fails()) {
            throw new \Exception(join(' ', $validator->errors()->all()));
        }
        try {
            \DB::beginTransaction();
            $this->sendMail($map);
            \DB::commit();

            return response()->json(['ok']);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ['error', ['Mail Not sent']];
        } catch (\Throwable $exception) {
            \DB::rollBack();
            return ['error', ['Mail Not sent. Code - ' . $exception->getCode()]];
        }
    }

    /**
     * @param Request $request
     */
    public function saveAndResend(Request $request)
    {

    }

    /**
     * @param array $data
     * @return array
     */
    private function sendMail(array $data)
    {
        $mailSupport = new MailSupport();
        $mailSupport->sendAsync(
            [
                'template' => 'admin.mail.custom_body',
                'to' => !empty($data['to']) ? $data['to'] : config('mail.store_admin'),
                'bcc' => $data['bcc'],
                'cc' => $data['cc'],
                'reply' => $data['reply_to'],
                'from' => $data['from'],
                'subject' => $data['subject'],
                'body' => $data['body'],
                'delay_time' => !empty($data['delay_time']) ? $data['delay_time'] : null,
                'drafted' => !empty($data['drafted']) ? $data['drafted'] : false,
                'id' => !empty($data['id']) ? $data['id'] : ''
            ]
        );
    }

    public function destroy($id)
    {
        $mail = $this->emailLog->findOrFail($id);
        $mail->delete();

        return $this->redirectNotFound();
    }
}
