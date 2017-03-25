<?php

use Illuminate\Database\Seeder;

/**
 * Class MailTemplatesToMediaSeeder.
 */
class MailTemplatesToMediaSeeder extends Seeder
{
    /**
     * @var \App\Core\Drivers\FolderToDb\Synchronizer
     */
    protected $synchronizer;

    /**
     * MailTemplatesToMediaSeeder constructor.
     *
     * @param \App\Core\Drivers\FolderToDb\Synchronizer $synchronizer
     */
    public function __construct(\App\Core\Drivers\FolderToDb\Synchronizer $synchronizer)
    {
        $this->synchronizer = $synchronizer;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mailsPath = public_path('mails');
        $this->synchronizer->synchronizeWithFiles($mailsPath, 'mails');
    }
}
