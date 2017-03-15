<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 15.03.2017
 * Time: 20:47
 */

namespace App\Core\Transformers;


use App\Core\Models\Category;
use App\Core\Models\Currency;
use League\Fractal\TransformerAbstract;

class CurrenciesDataTransformer extends TransformerAbstract
{
    /**
     * @param Currency $currency
     *
     * @return array
     */
    public function transform(Currency $currency)
    {
        return [
            'id'          => $currency->id,
            'name'        => $currency->name,
            'code' => $currency->code,
            'sign'      => $currency->sign,
            'main'  => $currency->main == 1 ? 'Yes' : 'No' ,
            'created_at'  => $currency->created_at,
            'updated_at'  => $currency->updated_at,
            'action'      => $this->getActions($currency),
        ];
    }

    /**
     * @param Currency $currency
     * @return string
     */
    private function getActions(Currency $currency): string
    {
        return
            '<a class="btn btn-xs btn-default edit" href="'.route('admin::settings::currency::edit', $currency->unique_id).'" title="Edit">
                <em class="fa fa-pencil-square-o"></em>
            </a>
            <a class="btn btn-xs btn-danger delete"
                data-id="'.$currency->id .'"
                data-name="'.$currency->name .'"
                >
                <i class="currency-trash fa fa-remove"></i>
            </a>';
    }

}
