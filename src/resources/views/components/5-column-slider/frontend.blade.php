<div class="laravel_block2_brand" id="laravel_block2_brand_{{$page_element_id}}">
    <x-frontend.row>
        <div class="swiper" id="laravel_block2_brand_swiper_{{$page_element_id}}">
            <div class="swiper-wrapper flex items-stretch">
                @foreach ($collections as $item)
                    <div class="swiper-slide" style="height: auto">
                        <div class="p-8 h-full flex items-center justify-center">
                            <img src="{{ $item->getFirstMedia("laravel_block2_brand")->getUrl() }}" alt="" class="w-full">
                        </div>
                    </div>          
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </x-frontend.row>
</div>


@push('js')
    <script>
        new Swiper("#laravel_block2_brand_{{$page_element_id}}", {
            slidesPerView: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                },
                1400: {
                    slidesPerView: 5
                },
            }
      /*       mousewheel: true,
            keyboard: true, */
        });
    </script>
@endpush



