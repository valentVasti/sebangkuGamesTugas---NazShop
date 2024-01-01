@extends('backend.sidebar')
@section('content')

<div class="relative top-20">
    <div class="w-full h-fit">
        <div class="w-full h-fit bg-white text-black p-8 shadow-xl rounded-3xl">
            <div class="bg-white text-black">
                <table id="myDataTable" class="w-full border-collapse border-spacing-y-0 border-spacing-x-[2px]">
                    <thead>
                        <tr class="text-left bg-yellow-600 text-white">
                            <th class="w-2">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th class="text-center">Approve</th>
                            <th>Created At</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($user as $data)
                        @if ($data->name != 'admin')
                        <tr>
                            <td>{{ $i-1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone_num }}</td>
                            @if($data->approve_status == '1')
                            <td><button class="bg-green-800 w-52"><i class="fa-solid fa-user-check"></i> Approved</button></td>
                            @else
                            <td><button class="bg-neutral-500 w-52"><i class="fa-solid fa-user-xmark"></i> Not Approved</button></td>
                            @endif
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            @if($data->approve_status == '1')
                            <td><button class="bg-red-700 text-white size-12 hover:bg-red-800" onclick="approveUser('{{ $data->id }}', 'Disapproving')" title="Disapprove this user"><i class="fa-solid fa-circle-xmark fa-xl"></i></button></td>
                            @else
                            <td><button class="bg-green-800 text-white size-12 hover:bg-green-900" onclick="approveUser('{{ $data->id }}', 'Approving')" title="Approve this user"><i class="fa-solid fa-circle-check fa-xl"></i></button></td>
                            @endif
                        </tr>
                        @endif
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function approveUser(id, type) {

        var approveTitle = type == "Approving" ? "Do you want to <strong>approve</strong> this user?" : "Do you want to <strong>disapprove</strong> this user?";
        var successTitle = type == "Approving" ? "User Approved!" : "User Disapprove!";
        var successMessage = type == "Approving" ? "This user successfully approved." : "This user successfully disapprove.";

        Swal.fire({
            title: approveTitle,
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: `Cancel`,
            icon: "warning",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                fetch("user/approved/" + id + "/" + type, {
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
                                text: "Approving failed",
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