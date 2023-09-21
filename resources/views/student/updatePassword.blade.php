<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>profile</title>
</head>
<body>
    @extends('layout.layout')
    @section('content')
    <section class = "w-full flex justify-center items-center">
        <form action="/student/update/password/{{auth('student')->user()->regno}}" method = "POST" class = "flex w-96 h-96 mt-20 p-10 gap-10 items-center flex-col shadow-md rounded">
            @csrf
            @if(Session::has('error'))
            <div class = "bg-red-100 text-red-500 text-center rounded-sm w-full h-10 p-2">
                {{Session::get('error')}}
            </div>
            @endif
            <label>
                <p>new password</p>
                <input type="password" name = "newpwd1" class = "bg-gray-100 rounded-sm w-full h-10 p-2" required>
            </label>
            <label>
                <p>confirm new password</p>
                <input type="password" name = "newpwd1_confirmed" class = "bg-gray-100 rounded-sm w-full h-10 p-2" required>
            </label>
            <button class = "bg-green-400 w-2/3 py-2 rounded text-white">change</button>
        </form>
    </section>
    @endsection('content')
   
    
</body>
</html>