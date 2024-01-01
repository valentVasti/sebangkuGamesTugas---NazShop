<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N A Z S H O P | {{ $title }}</title>
    @vite('resources/css/app.css')

    <script src="https://kit.fontawesome.com/695e4e902a.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js" integrity="sha256-aULwhztqcQjhipg7QZKtRpARqBMTF/iBYdbwkXBY2iI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.css" integrity="sha256-yUoNxsvX+Vo8Trj3lZ/Y5ZBf8HlBFsB6Xwm7rH75/9E=" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/695e4e902a.js" crossorigin="anonymous"></script>
</head>

<body class="font-serif flex items-center justify-center min-h-screen min-w-screen bg-black">
    <div class=" h-screen w-screen flex items-center justify-center">
        <div class="w-1/2">
            <!-- Slider main container -->
            <div class="swiper min-w-full h-screen">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide h-full"><img class="object-cover w-full h-full" src="{{ asset('images/login_img_1.jpg') }}" alt=""></div>
                    <div class="swiper-slide h-full"><img class="object-cover w-full h-full" src="{{ asset('images/login_img_2.jpg') }}" alt=""></div>
                    <div class="swiper-slide h-full"><img class="object-cover w-full h-full" src="{{ asset('images/login_img_3.jpg') }}" alt=""></div>
                </div>

            </div>

        </div>
        <div class="w-1/2 h-full bg-white p-10 flex flex-col justify-center items-center">
            @yield('content')
        </div>
    </div>
</body>

<script type="text/javascript">
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        effect: 'fade',
        direction: 'horizontal',
        autoplay: {
            delay: 2000
        },
        loop: true,
    });
</script>

</html>