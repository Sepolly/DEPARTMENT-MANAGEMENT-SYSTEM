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
        <form action="/student/update/image/{{auth('student')->user()->regno}}" method = "POST" class = "flex w-96 h-96 mt-20 p-10 gap-10 items-center flex-col shadow-md rounded" enctype="multipart/form-data">
            @csrf
            @if(Session::has('error'))
            <div class = "bg-red-100 text-red-500 text-center rounded-sm w-full h-10 p-2">
                {{Session::get('error')}}
            </div>
            @endif
            <span class = "flex items-center w-full px-4 py-2  ring-green-200 justify-between shadow-md">
                <label for = "fileupload" class="flex gap-2 item-center cursor-pointer hover:text-blue-400 transition-all">
                    <i class="fa-solid fa-upload text-xl"></i>
                    <p>upload photo</p>
                </label>
                <input type="file" name="image" class = "hidden" id="fileupload">
                <button type = "submit" class = "h-10 w-32 rounded text-center bg-blue-400 text-white hover:bg-blue-500 transition-all">submit</button>
            </span>
        </form>
    </section>
    @endsection('content')
   
    
</body>
</html>