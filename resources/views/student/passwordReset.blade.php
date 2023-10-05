<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>student | password reset</title>
</head>
<body>
    <div class="login-bg flex items-center justify-center w-full h-full bg-green-200">
        <form action = "/student/passwordReset" method = "POST" class="flex flex-col gap-6 justify-evenly bg-white shadow-md rounded w-1/4 h-1/2 p-8 mb-4">
            @csrf
        <div>
            <label class="block text-gray-600 text-sm font-medium mb-4" for="password">
                Email Address
            </label>
            <input value = "{{old('email')}}" name = "email" class="bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-gray-300" id="email" type="email" placeholder="email">
            @error('email')
                <p class="text-red-400 font-light">{{$message}}</p>
            @enderror
        </div>
        <div class="flex items-center justify-center">
            <button class="w-full flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-green-200">
            reset
        </div>
        <p class = "text-gray-500 text-sm font-light">an email address will be sent with all password reset instructions</p>
        <a href="/student/login" class = "text-center text-green-500 font-light hover:underline">login</a>
        </form>
      </div>
</body>
</html>