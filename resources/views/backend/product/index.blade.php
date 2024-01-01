@extends('backend.sidebar')
@section('content')

<div class="relative top-20 mb-10">
    <div class="w-full h-fit">
        <div class="w-full h-fit bg-white text-black p-8 shadow-xl rounded-3xl">
            <a href="{{ route('product.create') }}"><button class="bg-green-800 text-white text-sm p-2 mb-2">Add New Product &nbsp;<i class="fa-solid fa-plus"></i></button></a>
            <div class="bg-white text-black">
                <table id="myDataTable" class="w-full border-collapse border-spacing-y-0 border-spacing-x-[2px]">
                    <thead>
                        <tr class="text-left bg-yellow-600 text-white">
                            <th class="w-2">No</th>
                            <th>Product Name</th>
                            <th class="min-w-36">Price</th>
                            <th>Description</th>
                            <th class="text-center min-w-32">Status</th>
                            <th class="text-center">Image</th>
                            <th>Created At</th>
                            <th>Last Updated</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($product as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->product_name }}</td>
                            <td>Rp {{ number_format($data->price, 0, ',', '.') }} ,-</td>
                            <td class="truncate max-w-10" title="Click here to see full description" onclick="showFullDescription('{{ $data->description }}')">{{ $data->description }}</td>
                            @if($data->status == '1')
                            <td><button class="w-full bg-green-700 hover:bg-green-700">Active</button></td>
                            @else
                            <td><button class="w-full bg-amber-700 hover:bg-amber-700">Not Active</button></td>
                            @endif
                            <td class="text-center"><button class="size-10 bg-neutral-400 p-1 text-white hover:bg-neutral-500" onclick="showImage(`{{ asset('images/database/product/' . $data->product_img) }}`, '{{ $data->product_name }}')"><i class="fa-solid fa-eye"></i></button></td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td class="flex gap-2 items-center">
                                <button id="delete-btn" class="size-11 bg-red-800 hover:bg-red-900" onclick="deleteProduct('{{ $data->id }}')" title="Delete this product"><i class="fa-solid fa-trash fa-lg"></i></button>
                                <a class="flex justify-center items-center size-11 bg-blue-900 hover:bg-blue-950" href="{{ route('product.edit', ['id' => $data->id]) }}"><button><i class="fa-solid fa-pen-to-square fa-lg" title="Edit this product"></i></button></a>
                                @if($data->status == '1')
                                <button class="size-11 bg-amber-700 hover:bg-amber-800" onclick="activationProduct('{{ $data->id }}', 'Deactivate')" title="Deactivate this product"><i class="fa-solid fa-circle-down fa-lg"></i></button>
                                @else
                                <button class="size-11 bg-green-700 hover:bg-green-800" onclick="activationProduct('{{ $data->id }}', 'Activate')" title="Activate this product"><i class="fa-solid fa-circle-up fa-lg"></i></button>
                                @endif

                                @if($data->highlighted == '1')
                                <button class="size-11 bg-yellow-500 hover:bg-yellow-700" onclick="highlightProduct('{{ $data->id }}', true)" title="Activate this product"><i class="fa-solid fa-star"></i></button>
                                @else
                                <button class="size-11 bg-gray-500 hover:bg-gray-600" onclick="highlightProduct('{{ $data->id }}', false)" title="Activate this product"><i class="fa-solid fa-star"></i></button>
                                @endif
                            </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteProduct(id) {
        Swal.fire({
            title: "Do you want to delete this product?",
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: `Cancel`,
            icon: "warning",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                fetch("product/destroy/" + id, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },
                    })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        // Handle the response data
                        if (data.status == "Failed") {
                            Swal.fire({
                                title: "Failed!",
                                text: data.message,
                                icon: "error",
                                confirmButtonText: "OK!",
                            });
                        } else {
                            Swal.fire({
                                title: "Product Deleted!",
                                text: data.message,
                                icon: "success",
                                confirmButtonText: "OK!",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    })
                    .catch((error) => {
                        // Handle errors
                        Swal.fire({
                            title: "Error!",
                            text: error,
                            icon: "error",
                        });
                    });
            }
        });
    }

    function activationProduct(id, type) {

        var successMessage = type == 'Activate' ? "This product will appear to public." : "This product will not appear to public.";

        Swal.fire({
            title: "Do you want to <strong>" + type + "</strong> this product?",
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: `Cancel`,
            icon: "warning",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                fetch("product/activation/" + id + "/" + type, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },
                    })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        if (data.status == "Failed") {
                            Swal.fire({
                                title: "Failed!",
                                text: "Activation failed.",
                                icon: "error",
                                confirmButtonText: "OK!",
                            });
                        } else {
                            Swal.fire({
                                title: "Product " + type + "d!",
                                text: successMessage,
                                icon: "success",
                                confirmButtonText: "OK!",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }
        });
    }

    function highlightProduct(id, type) {

        var titleHighlight = type ? "Do you want to <strong>unhighlight</strong> this product?" : "Do you want to <strong>highlight</strong> this product?";
        var successTitle = type ? "Product Unhighlighted!" : "Product Highlighted!";
        var successMessage = type ? "This product will disappear from highlighted product section." : "This product will appear in highlighted product section.";

        Swal.fire({
            title: titleHighlight,
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: `Cancel`,
            icon: "warning",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                fetch("product/highlight/" + id, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },
                    })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        if (data.status == "Failed") {
                            Swal.fire({
                                title: "Failed!",
                                text: "Highlighting failed.",
                                icon: "error",
                                confirmButtonText: "OK!",
                            });
                        } else {
                            Swal.fire({
                                title: successTitle,
                                text: successMessage,
                                icon: "success",
                                confirmButtonText: "OK!",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }
        });
    }
</script>

@endsection