<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\EmailLog;
use App\Core\Models\EmailLogRecipient;
use App\Core\Repositories\EmailLogRepository;
use App\Core\Repositories\MailRepository;
use App\Core\Repositories\MailRepositoryEloquent;
use App\Core\Transformers\MailHistoryTransformer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

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
     * @var EmailLogRepository
     */
    private $emailLogRepository;
    /**
     * @var EmailLogRecipient
     */
    private $emailLogRecipient;
    /**
     * @var MailRepository
     */
    private $mailRepository;

    /**
     * AdminEmailsController constructor.
     *
     * @param EmailLogRepository $emailLogRepository
     * @param EmailLogRecipient  $emailLogRecipient
     * @param MailRepository     $mailRepository
     */
    public function __construct(EmailLogRepository $emailLogRepository,
                                EmailLogRecipient $emailLogRecipient,
                                MailRepository $mailRepository)
    {
        $this->emailLogRepository = $emailLogRepository;
        $this->emailLogRecipient = $emailLogRecipient;
        $this->mailRepository = $mailRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $mails = $this->emailLogRepository->simplePaginate();
        $total = $this->emailLogRepository->count();
        $no = $mails->firstItem();

        return $this->view('index', compact('mails', 'no', 'total'));
    }

    /**
     * @param Datatables $datatables
     *
     * @return mixed
     */
    public function history(Datatables $datatables)
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
        $mail = $this->emailLogRepository->find($id);
        $total = $this->emailLogRepository->count();
        // get previous mail id
        $previous = $this->emailLogRepository->getModel()->where('id', '<', $mail->id)->max('id');
        // get next mail id
        $next = $this->emailLogRepository->getModel()->where('id', '>', $mail->id)->min('id');

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
     *
     * @throws \Exception
     *
     * @return array
     */
    public function save(Request $request)
    {
        $map = [
            'subject'    => $request->get('subject'),
            'to'         => $request->get('to'),
            'body'       => $request->get('body'),
            'bcc'        => $request->get('bcc'),
            'cc'         => $request->get('cc'),
            'from'       => $request->get('from'),
            'reply_to'   => $request->get('reply_to'),
            'delay_time' => $request->get('delay_time'),
            'id'         => $request->get('id'),
        ];
        if ($map['delay_time']) {
            $validationArr = [
                'subject' => 'required',
                'body'    => 'required',
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
                    throw new \Exception(implode(' ', $validator->errors()->all()));
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

                return response()->json(['error' => 'Mail Not sent! Server msg: '.$exception->getMessage()],
                    $exception->getCode());
            } catch (\Throwable $exception) {
                \DB::rollBack();

                return response()->json(['error' => 'Mail Not sent. Code - '.$exception->getCode()],
                    $exception->getCode());
            }
        } else {
            return response()->json(['error' => 'Mail Not sent'], 500);
        }
    }

    /**
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return array
     */
    public function saveAsNew(Request $request)
    {
        $map = [
            'subject'    => $request->get('subject'),
            'to'         => $request->get('to'),
            'body'       => $request->get('body'),
            'bcc'        => $request->get('bcc'),
            'cc'         => $request->get('cc'),
            'from'       => $request->get('from'),
            'reply_to'   => $request->get('reply_to'),
            'delay_time' => $request->get('delay_time'),
        ];

        $map['drafted'] = true;
        $validationArr = [
            'subject' => 'required',
            'body'    => 'required',
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
            throw new \Exception(implode(' ', $validator->errors()->all()));
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

            return ['error', ['Mail Not sent. Code - '.$exception->getCode()]];
        }
    }

    /**
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return array
     */
    public function saveAsNewAndResend(Request $request)
    {
        $map = [
            'subject'    => $request->get('subject'),
            'to'         => $request->get('to'),
            'body'       => $request->get('body'),
            'bcc'        => $request->get('bcc'),
            'cc'         => $request->get('cc'),
            'from'       => $request->get('from'),
            'reply_to'   => $request->get('reply_to'),
            'delay_time' => $request->get('delay_time'),
        ];

        $validationArr = [
            'subject' => 'required',
            'body'    => 'required',
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
            throw new \Exception(implode(' ', $validator->errors()->all()));
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

            return ['error', ['Mail Not sent. Code - '.$exception->getCode()]];
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
     *
     * @return array
     */
    private function sendMail(array $data)
    {
        $mailRepository = app(MailRepositoryEloquent::class);
        $mailRepository->sendAsync(
            [
                'template'   => 'admin.mail.custom_body',
                'to'         => !empty($data['to']) ? $data['to'] : config('mail.store_admin'),
                'bcc'        => $data['bcc'],
                'cc'         => $data['cc'],
                'reply'      => $data['reply_to'],
                'from'       => $data['from'],
                'subject'    => $data['subject'],
                'body'       => $data['body'],
                'delay_time' => !empty($data['delay_time']) ? $data['delay_time'] : null,
                'drafted'    => !empty($data['drafted']) ? $data['drafted'] : false,
                'id'         => !empty($data['id']) ? $data['id'] : '',
            ]
        );
    }

    public function destroy($id)
    {
        $mail = $this->emailLogRepository->findOrFail($id);
        $mail->delete();

        return $this->redirectNotFound();
    }
}
