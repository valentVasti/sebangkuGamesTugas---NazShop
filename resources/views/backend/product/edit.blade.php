@extends('backend.sidebar')
@section('content')

<div class="relative top-20">
    <div class="w-full h-fit">
        <div class="w-full h-fit bg-white text-black p-8 shadow-xl rounded-3xl">
            <h1 class="mb-5">Edit Product</h1>
            <form class="flex flex-col gap-5 w-1/2" action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col w-full">
                    <label for="product_name" class="mb-2">Nama Produk</label>
                    <input id="product_name" name="product_name" type="text" placeholder="Input product name..." value="{{ $product->product_name }}">

                    @error('product_name')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="flex flex-col w-full">
                    <label for="price" class="mb-2">Harga</label>
                    <input id="price" name="price" type="number" placeholder="Input product price..." value="{{ $product->price }}">
                    @error('price')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label for="product_img" class="mb-2">Gambar Produk</label>
                    <input id="product_img" name="product_img" type="file" placeholder="Tes">
                    @error('product_img')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label for="description" class="mb-2">Description</label>
                    <textarea name="description" id="description" cols="10" rows="10">{{ $product->description }}</textarea>
                    @error('description')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="bg-green-700 text-white p-3 rounded-lg hover:bg-green-800">Submit Data</button>
            </form>
        </div>
    </div>
</div>

<style>
    textarea, input {
        border: solid 2px rgb(202 138 4);
        padding: 10px;
        border-radius: 10px;
    }
</style>

@endsection