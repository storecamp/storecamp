<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 26.12.2015
 * Time: 11:16
 */

namespace App\Core\components\Country;

use Webpatser\Countries\Countries;

class CountryBuilder
{

    public function buildCountrySelect($placeholder = null, $selected = null)
    {
        $result = Countries::orderBy('name', 'asc')->select('name','iso_3166_2')->lists('name','iso_3166_2');
        return view('includes.country-select', compact('result', 'placeholder', 'selected'));
    }

    public function getCountriesByValue($country)
    {
        $result = Countries::orderBy('name', 'asc')->where('iso_3166_2', strtoupper($country))->select('name')->first();
        return $result->name;
    }
}