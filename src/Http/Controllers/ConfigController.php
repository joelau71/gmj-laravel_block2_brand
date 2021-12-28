<?php

namespace GMJ\LaravelBlock2Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use Alert;
use App\Models\Element;
use GMJ\LaravelBlock2Brand\Models\Config;

class ConfigController extends Controller
{

    public function create($element_id)
    {
        $element = Element::findOrFail($element_id);
        return view('LaravelBlock2Brand.config::create', compact("element_id", "element"));
    }

    public function store($element_id)
    {
        $element = Element::findOrFail($element_id);

        request()->validate([
            "img_width" => ["required", "integer"],
            "img_height" => ["required", "integer"],
            "layout" => ["required"],
        ]);

        Config::create([
            "element_id" => $element_id,
            "img_width" => request()->img_width,
            "img_height" => request()->img_height,
            "layout" => request()->layout,
        ]);

        Alert::success("Add Element {$element->title} Brand Config success");
        return redirect()->route("LaravelBlock2Brand.index", $element_id);
    }

    public function edit($element_id)
    {
        $element = Element::findOrFail($element_id);
        $collection = Config::where("element_id", $element_id)->first();
        return view('LaravelBlock2Brand.config::edit', compact("element_id", "element", "collection"));
    }

    public function update($element_id)
    {
        request()->validate([
            "img_width" => ["required", "integer"],
            "img_height" => ["required", "integer"],
            "layout" => ["required"],
        ]);

        $collection = Config::where("element_id", $element_id)->first();

        $collection->update([
            "img_width" => request()->img_width,
            "img_height" => request()->img_height,
            "layout" => request()->layout,
        ]);

        $element = Element::findOrFail($element_id);

        Alert::success("Edit Element {$element->title} Brand success");
        return redirect()->route('LaravelBlock2Brand.index', $element_id);
    }
}
