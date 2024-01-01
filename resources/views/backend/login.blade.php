<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Page</title>
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center min-h-screen mx-h-full font-backend bg-yellow-600">
    <div class="bg-white w-96 p-5 rounded-2xl">
        <h1 class="text-center mb-10"><strong>Login Admin Page</strong></h1>

        <form method="post" action="{{ route('backend.login.auth') }}" class="flex flex-col gap-8">
            @csrf
            <div class="flex flex-col">
                <label for="username" class="mb-2 text-xl">Username</label>
                <input id="username" name="name" type="text" class="border-2 h-10 px-4 border-black">

                @error('name')
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


            @error('credentials_error')
            <div class="text-yellow-600">{{ $message }}</div>
            @enderror

            @error('not_admin')
            <div class="text-yellow-600">{{ $message }}</div>
            @enderror

            <button type="submit" class="bg-black text-white py-5 hover:bg-yellow-600 text-center">Login</button>

        </form>

</body>

</html>