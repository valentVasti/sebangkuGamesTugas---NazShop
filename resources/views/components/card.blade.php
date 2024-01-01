<div class="p-3">
    <div class="h-80 w-72 overflow-hidden bg-white">
        <img class="h-full w-full object-cover hover:scale-105 transition-all " src="{{ asset('images/database/product/'. $product['product_img'] ) }}" alt="">
    </div>
    <p class="text-lg my-2">{{ $product['product_name'] }}</p>
    <div class="flex w-full gap-2">

        <p class="text-2xl text-white font-backend font-bold bg-yellow-600 p-1 w-3/4">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
        <div class="bg-black text-white flex justify-center items-center p-4 w-1/4 hover:text-yellow-600 transition-all">
            <i class="fa-solid fa-cart-shopping fa-lg"></i>
        </div>
    </div>
</div>