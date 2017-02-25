<?php

namespace App\Core\Components\Select;


class SelectBuilder
{
    protected $instance;

    /**
     * TagsBuilder constructor.
     * @param $instance
     */
    public function __construct($instance = null)
    {
        $this->instance = $instance;
    }

    /**
     * @param $actionUrl
     * @param $attrName
     * @param $multiple
     * @param array $data
     * @param array $selected
     * @param null $class
     * @param null $placeholder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render(string $actionUrl,string $attrName, bool $multiple, $data = [], $selected = [], $class = null, $placeholder = null)
    {
        $result = [];
        $multiple = $multiple ? $multiple : false;
        $attrName = $attrName ? $attrName : ($multiple ? "select[]": "select");
        $className = $class;
        $class = "form-control ". ($class ? $class : " select_builder_select ") . ($multiple ? " multiple " : "");
        if(!empty($selected)) {
            if(!is_array($selected)){
                $selected = $selected->toArray();
            }
        } else {
            $selected = [];
        }
        if(!empty($data)) {
            if(!is_array($data)) {
                $result = $data->toArray();
            }
        }
        return view('_builders.select2',
            compact('result', 'placeholder', 'selected', 'multiple', 'attrName', 'class', 'className', 'actionUrl'));
    }

    protected function resolveAttrName($attrName = null) {

        if(isset($attrName)) {
            return $attrName;
        }
        else return false;
    }

}