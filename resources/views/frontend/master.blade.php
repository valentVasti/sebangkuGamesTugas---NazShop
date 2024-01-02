<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N A Z S H O P | {{ $title }}</title>
    <link href="{{ asset('build/assets/app-rpJn76bJ.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js" integrity="sha256-aULwhztqcQjhipg7QZKtRpARqBMTF/iBYdbwkXBY2iI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.css" integrity="sha256-yUoNxsvX+Vo8Trj3lZ/Y5ZBf8HlBFsB6Xwm7rH75/9E=" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/695e4e902a.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="font-serif tracking-wide">
    <div class="relative top-0">
        <nav class="bg-black text-white flex justify-between items-center w-full h-[75px] px-5">
            <div class="w-1/3">
                <div class="bg-white text-black text-2xl px-3 w-fit">N A Z S H O P</div>
            </div>

            <div class="w-2/3 flex justify-center">
                <img class="size-11" src="{{ asset('navbar-logo.png') }}" alt="">
            </div>
            <!-- <div>
                <input class="w-[500px] text-black p-1 rounded-full px-4" placeholder="Discount 40% all products!" />
            </div> -->
            <div class="w-1/3 text-right">
            @if(session('user_data') && session('status_login'))
            <span class="bg-yellow-600 size-fit p-3 rounded-full"><i class="fa-regular fa-user fa-xl"></i></span>&nbsp; Welcome, {{ session('user_data')['name'] }}&nbsp; &nbsp; <a href="{{ route('frontend.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket fa-xl hover:text-yellow-600"></i></a>
            @else
            <a href="{{ route('frontend.login') }}">
                <div><span class="bg-yellow-600 size-fit p-3 rounded-full"><i class="fa-regular fa-user fa-xl"></i></span> &nbsp;<a href="{{ route('frontend.login') }}" class="hover:text-yellow-600">Login</a>/<a href="{{ route('frontend.register') }}" class="hover:text-yellow-600">Sign Up</a></div>
            </a>
            @endif
            </div>
        </nav>

    </div>
    <div class="relative">
        @yield('content')
    </div>
    <footer class="bg-black w-full h-40 bottom-0 text-white flex justify-evenly gap-5">
        <div class="h-full w-1/4  p-10 flex justify-center items-center">
            <div class="bg-white text-black text-2xl px-3 size-fit">N A Z S H O P</div>
        </div>

        <div class="h-full w-2/4 p-10 flex flex-col gap-4 justify-center items-center">
            <p class="text-center underline-offset-8 w-full tracking-wider">"Fashion is the armor to survive the reality of everyday life." - Bill Cunningham</p>
            <hr class="border-yellow-600 border-1 w-full ">
            <div class="flex w-full gap-5 justify-center h-full mt-2 ">
                <i class="fa-brands fa-instagram fa-xl"></i>
                <i class="fa-brands fa-whatsapp fa-xl"></i>
                <i class="fa-brands fa-x-twitter fa-xl"></i>
            </div>
        </div>

        <div class="h-full w-1/4 flex p-10 items-center flex-col gap-2">
            <div>
                Selokan Mataram Street, Pogung Dalangan SIA XVI/11 No. 16, Sleman, Yogyakarta 55284
            </div>
            <div class="w-full text-left">
                <i class="fa-solid fa-headset fa-lg"></i>&nbsp;(24/7)<span class="font-backend">&nbsp; 0274 12345678</span>
            </div>
        </div>

    </footer>
</body>

</html>