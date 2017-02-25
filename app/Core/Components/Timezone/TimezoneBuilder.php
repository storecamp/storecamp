<?php

namespace App\Core\components\Timezone;

use Camroncade\Timezone\Timezone;

class TimezoneBuilder extends Timezone
{
    public $selected;
    protected $placeholder;
    protected $formAttributes;
    protected $optionAttributes;

    /**
     * TimezoneBuilder constructor.
     * @param $selected
     * @param $placeholder
     * @param $formAttributes
     * @param $optionAttributes
     */
    public function __construct($selected = null, $placeholder = null, array $formAttributes = [], array $optionAttributes = [])
    {
        $this->selected = $selected;
        $this->placeholder = $placeholder;
        $this->formAttributes = $formAttributes;
        $this->optionAttributes = $optionAttributes;
    }


    public function buildSelect($selected = null, $placeholder = null, array $formAttributes = [], array $optionAttributes = [])
    {
        if (!is_null($selected)) {
            $this->selected = $selected;
        } else {
            $this->selected = config('timezone.selected');
        }
        if (!is_null($placeholder)) {

            $this->placeholder = $placeholder;

        } else {
            $this->placeholder = config('timezone.placeholder');
        }
        if (!isset($formAttributes)) {
            $this->formAttributes = $formAttributes;
        } else {
            $this->formAttributes = config('timezone.formAttributes');
        }
        if (!isset($optionAttributes)) {
            $this->optionAttributes = $optionAttributes;
        } else {
            $this->optionAttributes = config('timezone.optionAttributes');
        }
        return $this->selectForm($this->selected, $this->placeholder, $this->formAttributes, $this->optionAttributes);

    }

    public function getTimezoneList()
    {
        return $this->timezoneList;
    }
}