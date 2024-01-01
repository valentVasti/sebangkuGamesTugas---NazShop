@extends('frontend.master')
@section('content')

<section class="relative h-[630px]">
    <div class="flex h-full min-w-screen relative">
        <div id="landing-swiper" class="landing-swiper relative w-1/2">
            <div class="swiper-wrapper max-w-[1200px] min-h-full relative">
                <div class="swiper-slide">
                    <img class="w-full h-[630px] object-cover" src="{{ asset('images/landing_swiper_1.jpeg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="w-full h-[630px] object-cover" src="{{ asset('images/landing_swiper_2.jpeg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="w-full h-[630px] object-cover" src="{{ asset('images/landing_swiper_3.jpeg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="w-full h-[630px] object-cover" src="{{ asset('images/landing_swiper_4.jpeg') }}" alt="">
                </div>
            </div>
        </div>
        <div id="four-swiper" class="w-1/2 h-[630px] flex flex-wrap">
            <div class="w-1/2 h-1/2">
                <div id="landing-swiper-1" class="landing-swiper relative w-full h-full">
                    <div class="swiper-wrapper max-w-[1200px] min-h-full relative">
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_5.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_6.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_7.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_8.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 h-1/2">
                <div id="landing-swiper-2" class="landing-swiper relative w-full h-full">
                    <div class="swiper-wrapper max-w-[1200px] min-h-full relative">
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_9.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_10.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_11.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_12.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 h-1/2">
                <div id="landing-swiper-3" class="landing-swiper relative w-full h-full">
                    <div class="swiper-wrapper max-w-[1200px] min-h-full relative">
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_13.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_14.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_15.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_16.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 h-1/2">
                <div id="landing-swiper-4" class="landing-swiper relative w-full h-full">
                    <div class="swiper-wrapper max-w-[1200px] min-h-full relative">
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_17.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_18.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_19.jpeg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full h-[315px] object-cover" src="{{ asset('images/landing_swiper_20.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute h-full w-full top-0 left-0 z-10 bg-transparent text-black flex flex-col justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-7xl bg-white p-5">Fashion are fundamental.</h1>
                <h1 class="text-4xl bg-black text-white p-5 w-fit text-center pointer"><a href="#products-container">Start shopping now!</a></h1>
            </div>
        </div>

        <div class="absolute h-full w-full top-0 left-0 opacity-30 bg-yellow-600 z-[5] text-black"></div>
    </div>
</section>
<section class="h-[600px] flex justify-center items-center">
    <div class="p-5 flex flex-col justify-center items-center">
        <div class="flex gap-5 w-full h-96">
            <div class="w-1/4 h-full flex flex-col justify-center items-center gap-5 px-3">
                <i class="fa-solid fa-truck-fast text-9xl"></i>
                <h1 class="text-2xl">Fast Shipment</h1>
                <p class="text-center text-yellow-600">We don't want you to wait too long! Your order will arrive ASAP!</p>
            </div>
            <div class="w-1/4 h-full flex flex-col justify-center items-center gap-5 px-3">
                <div class="relative">
                    <i class="fa-solid fa-newspaper text-9xl"></i>
                    <i class="fa-solid fa-shirt absolute top-[28px] left-[44px] text-2xl"></i>
                </div>
                <h1 class="text-2xl">Up To Date Fashion</h1>
                <p class="text-center text-yellow-600">Our product are up to date based on nowaday fashion trends!</p>
            </div>
            <div class="w-1/4 h-full flex flex-col justify-center items-center gap-5 px-3">
                <div class="relative">
                    <i class="fa-regular fa-calendar text-9xl"></i>
                    <i class="fa-solid fa-percent absolute top-[53px] left-[35px] text-6xl"></i>
                </div>
                <h1 class="text-2xl">Discount every day</h1>
                <p class="text-center text-yellow-600">Don't forget to check our product for discounts!</p>
            </div>
            <div class="w-1/4 h-full flex flex-col justify-center items-center gap-5 px-3">
                <div class="relative">
                    <i class="fa-solid fa-certificate text-9xl"></i>
                    <i class="fa-solid fa-circle-check absolute top-[35px] left-[35px] text-6xl text-white"></i>
                </div>
                <h1 class="text-2xl">Guaranteed Authenticity</h1>
                <p class="text-center text-yellow-600">We only sell high quality fashion with guaranteed authenticity!</p>
            </div>
        </div>
    </div>
</section>
<section id="products-container" class="flex flex-col items-center py-5 gap-5">
    <div>
        <h1 class="text-3xl text-center">Highlighted Products</h1>
        <p class="text-center my-4 text-yellow-600">These are some highlighted product choosen by our fashion expert!</p>

        <div class="swiper relative w-[1200px]">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper flex justify-center">
                <!-- Slides -->
                @foreach ($highlighted_product as $data)
                <div class="swiper-slide">
                    <div class="flex justify-center items-center" onclick="showDetailProduct('{{ $data->product_name }}', '{{ $data->price }}', '{{ $data->description }}', '{{ $data->product_img }}')">
                        <x-card :product="$data" />
                    </div>
                </div>
                @endforeach
            </div>

            <!-- If we need navigation buttons -->
            <div class="custom-swiper-button-prev bg-white rounded-full absolute top-[160px] left-5 z-10 hover:bg-yellow-600 p-3 size-10 flex justify-center items-center shadow-xl"><i class="fa-solid fa-arrow-left fa-lg"></i></div>
            <div class="custom-swiper-button-next bg-white rounded-full absolute top-[160px] right-5 z-10 hover:bg-yellow-600 p-3 size-10 flex justify-center items-center shadow-xl"><i class="fa-solid fa-arrow-right fa-lg"></i></div>
        </div>
    </div>
</section>
<section class="flex flex-col items-center py-5 gap-5">
    <div>
        <h1 class="text-3xl text-center">All Products</h1>
        <p class="text-center mt-2 text-yellow-600">Check all of our products here!</p>
    </div>
    <div class="flex flex-wrap w-full justify-center gap-5">
        @foreach($product as $data)
        <div class="flex justify-center items-center p-0 m-0" onclick="showDetailProduct('{{ $data->product_name }}', '{{ $data->price }}', '{{ $data->description }}', '{{ $data->product_img }}')">
            <x-card :product="$data" />
        </div>
        @endforeach
    </div>
</section>

<script type="text/javascript">
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 4,

        // Navigation arrows
        navigation: {
            nextEl: '.custom-swiper-button-next',
            prevEl: '.custom-swiper-button-prev',
        },
    });

    const landingSwiperElement = document.getElementById('landing-swiper');
    const landingSwiperElement1 = document.getElementById('landing-swiper-1');
    const landingSwiperElement2 = document.getElementById('landing-swiper-2');
    const landingSwiperElement3 = document.getElementById('landing-swiper-3');
    const landingSwiperElement4 = document.getElementById('landing-swiper-4');

    const prevBtn = document.querySelector('.custom-swiper-button-prev');
    const nextBtn = document.querySelector('.custom-swiper-button-next');

    prevBtn.addEventListener('click', function() {
        swiper.slidePrev(500);
    })

    nextBtn.addEventListener('click', function() {
        swiper.slideNext(500);
    })

    const landingSwiper = new Swiper(landingSwiperElement, {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,

        effect: 'fade',
        autoplay: {
            delay: 2000
        },
        loop: true,
    });

    const landingSwiper1 = new Swiper(landingSwiperElement1, {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,

        effect: 'fade',
        autoplay: {
            delay: 1000
        },
        loop: true,
    });

    const landingSwiper2 = new Swiper(landingSwiperElement2, {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,

        effect: 'fade',
        autoplay: {
            delay: 3000
        },
        loop: true,
    });

    const landingSwiper3 = new Swiper(landingSwiperElement3, {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,

        effect: 'fade',
        autoplay: {
            delay: 4000
        },
        loop: true,
    });

    const landingSwiper4 = new Swiper(landingSwiperElement4, {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,

        effect: 'fade',
        autoplay: {
            delay: 5000
        },
        loop: true,
    });

    function showDetailProduct(product_name, price, description, product_img) {
        Swal.fire({
            width: 'auto',
            height: 'auto',
            title: "Product Detail",
            html: `    
            <div class="h-[350px] w-[800px]">
                <div class="flex w-full h-full gap-3">
                    <div id="img-container" class="w-2/3 h-full bg-black flex justify-center">
                        <img src="{{ asset('images/database/product/` + product_img + `') }}" alt="" class="w-auto h-full object-contain object-center">
                    </div>
                    <div id="detail-container" class="w-full h-full text-left bg-yellow-600 text-white p-5 relative flex flex-col justify-between">
                        <div>
                            <p class="text-sm">Product Name: </p>
                            <h1><strong>` + product_name + `</strong></h1>
                        </div>
                        <div>
                            <p class="text-sm">Description: </p>
                            <p class="text-neutral-200 text-sm h-28 overflow-y-scroll">` + description + `</p>
                        </div>

                        <div class=" bg-black w-full flex justify-between">
                            <div class="bg-white text-black w-1/6 flex justify-center items-center">
                                <i class="fa-solid fa-tag fa-xl animate-pulse"></i>
                            </div>
                            <div class="bg-black text-2xl text-center p-5 w-5/6">
                                <p>Rp ` + price + `,-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`,
            showConfirmButton: false, // This line hides the default "OK" button
            showClass: {
                popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                    `
            },
            hideClass: {
                popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                    `
            }
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

@endsection