<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 9/24/2017
 * Time: 11:49 PM
 */

namespace App\Core\Commands;


use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailbox:send {email} {subject=Test message} {view=emails.test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data['to'] = $this->argument('email');
        $data['subject'] = $this->argument('subject');
        $view = $this->argument('view');

        Mail::send($view, [], function (Message $message) use ($data) {
            $message
                ->to($data['to'])
                ->from('nikoleivan@gmail.com', 'Test')
                ->subject($data['subject']);
        });

        echo 'Done' . PHP_EOL;
    }
}
