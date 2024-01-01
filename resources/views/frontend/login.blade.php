@extends('frontend.masterRegister')
@section('content')

<div class="h-fit w-96 flex flex-col gap-8">
    <h1 class="text-3xl">Login to your account</h1>

    <form method="post" action="{{ route('frontend.login.auth') }}" class="flex flex-col gap-5">
        @csrf
        <div class="flex flex-col">
            <label for="email" class="mb-2 text-xl">E-mail</label>
            <input id="email" name="email" type="text" class="border-2 h-10 px-4 border-black">

            @error('email')
            <div class="text-yellow-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="password" class="mb-2 text-xl">Password</label>
            <input id="password" name="password" type="password" class="border-2 h-10 px-4 border-black">

            @error('password')
            <div class="text-yellow-600">
                {{ $message }}
            </div>
            @enderror
        </div>


        @error('credential_error')
            <div class="text-yellow-600">{{ $message }}</div>
        @enderror

        <button type="submit" class="bg-black text-white py-5 hover:bg-yellow-600 text-center">Start shopping!</button>

    </form>
    <p>Don't have account? Sign up <a href="{{ route('frontend.register') }}"><span class="underline underline-offset-2 hover:text-yellow-600">here</span></a></p>

    <strong>"Unleash your style statement and shop the latest trends."</strong>

    @isset($status)
    <div class="absolute right-10 top-10 bg-green-600 p-5 text-white animate-pulse">Account Created! Login now!</div>
    @endisset

</div>

@endsection