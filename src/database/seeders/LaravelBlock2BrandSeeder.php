<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\ElementTemplate;
use GMJ\LaravelBlock2Brand\Models\Block;
use GMJ\LaravelBlock2Brand\Models\Config;
use Illuminate\Database\Seeder;
use Image;

class LaravelBlock2BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = ElementTemplate::where("component", "LaravelBlock2Brand")->first();

        if ($template) {
            return false;
        }

        $template = ElementTemplate::create(
            [
                "title" => "Laravel Block2 Brand",
                "component" => "LaravelBlock2Brand",
            ]
        );
        $element = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-block2-brand-sample",
            "is_active" => 1
        ]);

        Config::create([
            "element_id" => $element->id,
            "img_width" => 400,
            "img_height" => 400,
            "layout" => "6-column"
        ]);

        for ($i = 1; $i < 7; $i++) {
            $collection = Block::create([
                "element_id" => $element->id,
                "display_order" => $i
            ]);

            $collection->addMedia(storage_path("demo/brand/{$i}.svg"))
                ->preservingOriginal()
                ->toMediaCollection("laravel_block2_brand");
        }
    }
}
