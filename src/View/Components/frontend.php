<?php

namespace GMJ\LaravelBlock2Brand\View\Components;

use GMJ\LaravelBlock2Brand\Models\Block;
use GMJ\LaravelBlock2Brand\Models\Config;
use Illuminate\View\Component;

class Frontend extends Component
{
    public $element_id;
    public $page_element_id;
    public $collections;

    public function __construct($pageElementId, $elementId)
    {
        $this->page_element_id = $pageElementId;
        $this->element_id = $elementId;
        $this->collections = Block::where("element_id", $elementId)->orderBy("display_order")->get();
    }

    public function render()
    {
        $config = Config::where("element_id", $this->element_id)->first();
        $layout = $config->layout;
        return view("LaravelBlock2Brand::components.{$layout}.frontend");
    }
}
