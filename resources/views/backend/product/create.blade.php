@extends('backend.sidebar')
@section('content')

<div class="relative top-20">
    <div class="w-full h-fit">
        <div class="w-full h-fit bg-white text-black p-8 shadow-xl rounded-3xl">
            <h1 class="mb-5">Add New Product</h1>
            <form class="flex flex-col gap-5 w-1/2" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col w-full">
                    <label for="product_name" class="mb-2">Product Name</label>
                    <input id="product_name" name="product_name" type="text" placeholder="Input product name..." value="{{ old('product_name') }}">

                    @error('product_name')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="flex flex-col w-full">
                    <label for="price" class="mb-2">Price</label>
                    <input id="price" name="price" type="number" placeholder="Input product price..." value="{{ old('price') }}">
                    @error('price')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label for="product_img" class="mb-2">Product Image</label>
                    <input id="product_img" name="product_img" type="file" placeholder="Tes">
                    @error('product_img')
                    <div class="text-yellow-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label for="description" class="mb-2">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
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
    input, textarea {
        border: solid 2px rgb(202 138 4);
        padding: 10px;
        border-radius: 10px;
    }
</style>

@endsection