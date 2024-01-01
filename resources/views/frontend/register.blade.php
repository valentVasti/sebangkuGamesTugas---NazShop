@extends('frontend.masterRegister')
@section('content')

<div class="h-fit w-96 flex flex-col gap-5">
    <h1 class="text-3xl">Create an account to start!</h1>

    <form method="post" action="{{ route('frontend.register.create') }}" class="flex flex-col gap-5">
        @csrf
        <div class="flex flex-col">
            <label for="name" class="mb-2 text-xl">Name</label>
            <input id="name" name="name" type="text" class="border-2 h-10 px-4 border-black" value="{{ old('name') }}">
            @error('name')
            <div class="text-yellow-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="phone_num" class="mb-2 text-xl">Phone Number</label>
            <input id="phone_num" name="phone_num" type="number" class="border-2 h-10 px-4 border-black" value="{{ old('phone_num') }}">
            @error('phone_num')
            <div class="text-yellow-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="email" class="mb-2 text-xl">Email</label>
            <input id="email" name="email" type="email" class="border-2 h-10 px-4 border-black" value="{{ old('email') }}">
            @error('email')
            <div class="text-yellow-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="password" class="mb-2 text-xl">Password</label>
            <input id="password" name="password" type="password" class="border-2 h-10 px-4 border-black" value="{{ old('password') }}">
            @error('password')
            <div class="text-yellow-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        <input class="hidden" name="type" value="2" type="text">

        <button type="submit" class="bg-black text-white py-5 hover:bg-yellow-600 text-center">Sign Me Up!</button>

        <p>Already have an account? Login <a href="{{ route('frontend.login') }}"><span class="underline underline-offset-2 hover:text-yellow-600">here</span></a></p>

        <strong>"Ready to elevate your fashion game? Sign Up to start!"</strong>
    </form>

</div>

@endsection