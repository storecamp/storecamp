<?php

namespace App\Core\Contracts;

interface MailCampaignSystemContract
{
    public function generateCampaign($request);
}
