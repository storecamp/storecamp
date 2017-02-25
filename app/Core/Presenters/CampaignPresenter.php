<?php

namespace App\Core\Presenters;

use App\Core\Transformers\CampaignTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class CampaignPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class CampaignPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CampaignTransformer();
    }
}
