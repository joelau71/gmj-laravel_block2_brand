<div class="laravel_block2_brand" id="laravel_block2_brand_{{$page_element_id}}">
    <x-frontend.row>
        <div class="flex flex-wrap">
            @foreach ($collections as $item)
                <div class="w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 box flex items-center">
                    <div class="p-8">
                        <img src="{{ $item->getFirstMedia("laravel_block2_brand")->getUrl() }}" alt="" class="w-full">
                    </div>
                </div>          
            @endforeach
        </div>
    </x-frontend.row>
</div>

@push('js')
    <script>
        gsap.from("#laravel_block2_brand_{{$page_element_id}} .box", {
            scrollTrigger:{
                trigger: "#laravel_block2_brand_{{$page_element_id}}",
                start: 'top 60%',
                once: true
            },
            y: 200,
            opacity: 0,
            stagger: 0.1,
            duration: 0.6,
        });
    </script>
@endpush



