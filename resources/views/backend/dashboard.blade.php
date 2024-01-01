@extends('backend.sidebar')
@section('content')
<div class="relative top-20">
    <div class="flex w-full flex-wrap h-fit">
        <div class="w-1/2 p-3">
            <div class="bg-white text-black size-80 w-full p-5 relative rounded-3xl shadow-xl">
                <h3><strong>Product</strong></h3>
                <h1 class="text-8xl">{{ $count_data['product_count'] }}</h1>
                <div class="bg-yellow-600 text-white absolute bottom-0 left-0 w-full h-40 p-5 rounded-b-3xl">
                    <h3>Active Products</h3>
                    <h1 class="text-8xl">{{ $count_data['active_product_count'] }}</h1>
                    <div class="bg-white text-yellow-600 absolute top-0 right-0 w-20 h-20 p-5 flex justify-center items-center rounded-bl-2xl">
                        <i class="fa-solid fa-box fa-2xl animate-pulse"></i>
                    </div>
                    <div class="bg-white text-yellow-600 absolute top-0 right-[100px] w-30 h-5 p-4 flex justify-center items-center rounded-b-2xl">
                        <h3 class="text-sm">Last Updated: <strong>{{ $last_updated_data['product'] }}</strong></h3>
                    </div>
                </div>
                <div class="bg-yellow-600 text-white absolute top-0 right-0 w-20 h-20 p-5 flex justify-center items-center rounded-bl-2xl rounded-tr-xl">
                    <i class="fa-solid fa-box fa-2xl"></i>
                </div>
                <div class="bg-yellow-600 text-white absolute top-0 right-[100px] w-30 h-5 p-4 flex justify-center items-center rounded-b-2xl">
                    <h3 class="text-sm">Last Updated: <strong>{{ $last_updated_data['active_product'] }}</strong></h3>
                </div>
            </div>
        </div>
        <div class="w-1/2 p-3">
            <div class="bg-white text-black size-80 w-full p-5 relative rounded-3xl shadow-xl">
                <h3><strong>User</strong></h3>
                <h1 class="text-8xl">{{ $count_data['user_count']-1 }}</h1>
                <div class="bg-yellow-600 text-white absolute bottom-0 left-0 w-full h-40 p-5 rounded-b-3xl">
                    <h3>Active User</h3>
                    <h1 class="text-8xl">{{ $count_data['active_user_count'] }}</h1>
                    <div class="bg-white text-yellow-600 absolute top-0 right-0 w-20 h-20 p-5 flex justify-center items-center rounded-bl-2xl">
                        <i class="fa-solid fa-circle-user fa-2xl animate-pulse"></i>
                    </div>
                    <div class="bg-white text-yellow-600 absolute top-0 right-[100px] w-30 h-5 p-4 flex justify-center items-center rounded-b-2xl">
                        <h3 class="text-sm">Last Updated: <strong>{{ $last_updated_data['user'] }}</strong></h3>
                    </div>
                </div>
                <div class="bg-yellow-600 text-white absolute top-0 right-0 w-20 h-20 p-5 flex justify-center items-center rounded-bl-2xl  rounded-tr-xl">
                    <i class="fa-solid fa-circle-user fa-2xl"></i>
                </div>
                <div class="bg-yellow-600 text-white absolute top-0 right-[100px] w-30 h-5 p-4 flex justify-center items-center rounded-b-2xl">
                    <h3 class="text-sm">Last Updated: <strong>{{ $last_updated_data['active_user'] }}</strong></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-fit p-3">
        <div class="w-full h-fit bg-white text-black p-8 shadow-xl rounded-3xl">
            <p class="text-3xl mb-5">Latest <strong>10</strong> Products</p>
            <div class="bg-white text-black">
                <table id="myDataTable" class="w-full border-collapse border-spacing-y-0 border-spacing-x-[2px]">
                    <thead>
                        <tr class="text-left bg-yellow-600 text-white">
                            <th class="w-2">No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Image</th>
                            <th>Created At</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($product as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->product_name }}</td>
                            <td>Rp {{ number_format($data->price, 0, ',', '.') }} ,-</td>
                            <td class="truncate max-w-14" title="Click here to see full description" onclick="showFullDescription('{{ $data->description }}')">{{ $data->description }}</td>
                            @if($data->status == '1')
                            <td><button class="w-full bg-green-700 hover:bg-green-700">Active</button></td>
                            @else
                            <td><button class="w-full bg-amber-700 hover:bg-amber-700">Not Active</button></td>
                            @endif
                            <td class="text-center"><button class="size-10 bg-neutral-400 p-1 text-white hover:bg-neutral-500" onclick="showImage(`{{ asset('images/database/product/' . $data->product_img) }}`, '{{ $data->product_name }}')"><i class="fa-solid fa-eye"></i></button></td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection