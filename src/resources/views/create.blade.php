<x-admin.layout.app>
    @php
    $breadcrumbs = [
        ['name' => 'Element', 'link' => route("admin.element.index")],
        ['name' => $element->title],
        ['name' => "Brand Content", "link" => route('LaravelBlock2Brand.index', $element->id)],
        ['name' => "Create"]
    ];
    @endphp
    <x-admin.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <form
        class="relative mt-7"
        method="POST"
        action="{{ route("LaravelBlock2Brand.store", $element->id) }}"
    >
        @csrf
        
        <x-admin.atoms.required />

        <x-admin.atoms.row>
            <x-admin.atoms.label class="required mb-2">
                Image ({{ $config->img_width }} x {{ $config->img_height }}) (only accept jpg, png)
            </x-admin.atoms.label>
            <input
                type="file"
                name="image"
                id="image"
                class="upload-image-copper"
                data-uic-display-width="{{ $config->img_width }}"
                data-uic-display-height="{{ $config->img_height }}"
                data-uic-target-width="{{ $config->img_width }}"
                data-uic-target-height="{{ $config->img_height }}"
                data-uic-title="Size: {{ $config->img_width }}(w) x {{ $config->img_height }}(h)"
            />
            @error("uic_base64_image")
                <x-admin.atoms.error>
                    {{ $message }}
                </x-admin.atoms.error>
            @enderror
        </x-admin.atoms.row>

        <hr class="my-10">

        <div class="text-right">
            <x-admin.atoms.link
                href="{{ route('LaravelBlock2Brand.index', $element->id) }}"
            >
                Back
            </x-admin.atoms.link>
            <x-admin.atoms.button id="save">
                Save
            </x-admin.atoms.button>
        </div>

    </form>
</x-admin.layout.app>
