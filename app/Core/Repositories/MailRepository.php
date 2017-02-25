<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface MailRepository
 * @package namespace App\Core\Repositories;
 */
interface MailRepository extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function resolveTmpMails();

    /**
     * @param $uid
     * @return mixed
     */
    public function resolveMailHistory($uid);


    /**
     * @param $file
     * @return mixed
     */
    public function getTmpMail($file);

    /**
     * @param $folder
     * @param $filename
     * @return mixed
     */
    public function getHistoryTmpMail($folder, $filename);
}
