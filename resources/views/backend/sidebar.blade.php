<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NazShop Admin | {{ $title }}</title>
    @vite('resources/css/app.css')

    <script src="https://kit.fontawesome.com/695e4e902a.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="overflow-x-hidden font-backend w-fit h-fit">
    <nav class="fixed top-0 z-10 bg-white w-full h-20 flex shadow-lg text-black">
        <div class="w-2/12"></div>
        <div class="w-10/12 flex p-5 items-center justify-between">
            <h1 class="text-3xl"><strong>{{ $title }}</strong></h1>
            <h2 class="text-xl"><i class="fa-regular fa-user fa-lg text-yellow-600"></i> &nbsp;Admin &nbsp;<a href="{{ route('backend.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket fa-lg hover:text-yellow-600"></i></a>
            </h2>
        </div>
    </nav>
    <div class="flex w-screen min-h-screen max-h-full bg-neutral-100 justify-end relative">
        <aside class="min-h-full w-2/12 z-20 bg-black left-0 text-white rounded-r-[30px] p-10 fixed">
            <div class="bg-white text-black text-2xl px-3 font-serif mb-10">N A Z S H O P</div>
            <ul class="flex flex-col gap-5 text-lg">
                <li class="hover:text-yellow-600 cursor-pointer"><a href="{{ route('backend.dashboard') }}"><span><i class="fa-solid fa-house"></i></span> &nbsp;Dashboard</a></li>
                <li class="hover:text-yellow-600 cursor-pointer"><a href="{{ route('product.index') }}"><span><i class="fa-solid fa-box hover:bg-yellow-600"></i></span> &nbsp;Products</a></li>
                <li class="hover:text-yellow-600 cursor-pointer"><a href="{{ route('user.index') }}"><span><i class="fa-solid fa-user hover:bg-yellow-600"></i></span> &nbsp;User</a></li>
            </ul>
        </aside>
        <div class="h-full w-10/12 p-5 pb-16">
            @yield('content')
        </div>
    </div>
</body>

<script>
    function showImage(url, product_name) {
        console.log(url);

        Swal.fire({

            title: "Product Image",
            text: product_name,
            imageUrl: url,
            imageWidth: 'auto',
            imageHeight: 400,
            imageAlt: "Custom image",
            showConfirmButton: false,
            showClass: {
                popup: ` animate__animated animate__fadeIn animate__faster `
            }

            ,
            hideClass: {
                popup: ` animate__animated animate__fadeOut animate__faster `
            }
        });

    }

    function showFullDescription(desc) {
        Swal.fire({

            title: "Product Description",
            text: desc,
            imageAlt: "Custom image",
            showClass: {
                popup: ` animate__animated animate__fadeIn animate__faster `
            }

            ,
            hideClass: {
                popup: ` animate__animated animate__fadeOut animate__faster `
            }
        });
    }
</script>

</html>