<?php

namespace GMJ\LaravelBlock2Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use Alert;
use App\Models\Element;
use GMJ\LaravelBlock2Brand\Models\Block;
use GMJ\LaravelBlock2Brand\Models\Config;

class BlockController extends Controller
{
    public function index($element_id)
    {
        $config = Config::where("element_id", $element_id)->first();
        if (!$config) {
            return redirect()->route("LaravelBlock2Brand.config.create", $element_id);
        }

        $element = Element::findOrFail($element_id);
        $collections = Block::where("element_id", $element_id)->orderBy("display_order")->get();

        return view('LaravelBlock2Brand::index', compact("element_id", "element", "collections"));
    }

    public function create($element_id)
    {
        $element = Element::findOrFail($element_id);
        $config = Config::where("element_id", $element_id)->first();
        return view('LaravelBlock2Brand::create', compact("element_id", "element", "config"));
    }

    public function store($element_id)
    {
        $rules["uic_base64_image"] = "required";

        request()->validate($rules);

        $display_order = Block::where("element_id", $element_id)->max("display_order");
        $display_order++;

        $collection = Block::create([
            "element_id" => $element_id,
            "display_order" => $display_order
        ]);

        $collection->addMediaFromBase64(request()->uic_base64_image, ["image/jpeg", "image/png"])->toMediaCollection('laravel_block2_brand');

        $element = Element::findOrFail($element_id);
        $element->active();

        Alert::success("Add Element {$element->title} Brand success");
        return redirect()->back();
    }

    public function edit($element_id, $id)
    {
        $element = Element::findOrFail($element_id);
        $collection = Block::findOrFail($id);
        $config = Config::where("element_id", $element_id)->first();

        return view('LaravelBlock2Brand::edit', compact("element_id", "element", "collection", "config"));
    }

    public function update($element_id, $id)
    {
        $element = Element::findOrFail($element_id);
        $brand = Block::findOrFail($id);

        if (request()->uic_base64_image) {
            $brand->addMediaFromBase64(request()->uic_base64_image, ["image/jpeg", "image/png"])->toMediaCollection('laravel_block2_brand');
        }

        Alert::success("Edit Element {$element->title} Brand success");
        return redirect()->route('LaravelBlock2Brand.index', $element_id);
    }

    public function order($element_id)
    {
        $element = Element::find($element_id);
        $collections = Block::where("element_id", $element_id)->orderBy("display_order")->get();
        return view("LaravelBlock2Brand::order", compact("element_id", "element", "collections"));
    }

    public function order2($element_id)
    {
        foreach (request()->id as $key => $item) {
            $collectioni = Block::find($item);
            $num = $key + 1;
            $collectioni->display_order = $num;
            $collectioni->save();
        }
        $element = Element::find($element_id);
        Alert::success("Edit Element {$element->title} Brand Order success");
        return redirect()->route('LaravelBlock2Brand.index', $element_id);
    }

    public function destroy($element_id, $id)
    {
        $collection = Block::findOrFail($id);
        $collection->delete();
        $element = Element::find($element_id);
        if ($collection->count() < 1) {
            $element->inactive();
        }
        Alert::success("Delete Element {$element->title} Brand success");
        return redirect()->route('LaravelBlock2Brand.index', $element_id);
    }
}
