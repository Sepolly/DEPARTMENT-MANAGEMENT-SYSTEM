<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>profile</title>
</head>
<body>
   @extends('layout.studentLayout')
   @section('content')
    <section class = "relative w-full flex justify-center items-center">

        @if(Session::has('status'))
        <div id = "alertBox" class="absolute top-0 drop-shadow-lg w-64 h-10 flex justify-center items-center gap-2 bg-white text-green-500 text-center rounded">
            <i class="fa-solid fa-circle-check"></i>
            {{Session::get('status')}}
        </div>
        @endif

        <div class = "flex w-96 h-96 mt-20 p-5 gap-10 items-center flex-col shadow-md rounded">
            <div class = "flex flex-1">
                <a href="/student/update/image/{{auth('student')->user()->regno}}">
                    @if(auth('student')->user()->image)
                        <img src="{{asset('/images/profile/'.auth('student')->user()->image)}}" alt="" class = "h-48 w-48 rounded-full relative" alt="profile image">
                    @else
                        <img src="{{asset('/images/profile/profile-default-sm.png')}}" alt="" class = "h-32 w-32 rounded-sm" alt="default">
                    @endif
                </a>
            </div>

            {{-- students profile functions --}}
            <div class="grid grid-cols-2 gap-4">
                <a href="/student/update/password/{{ auth('student')->user()->regno }}" class="block">
                    <button class="w-full flex gap-1 items-center p-2 rounded-md hover:text-green-500 hover:bg-green-100  transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                        edit password
                    </button>
                </a>
                <a href="/student/update/password/{{ auth('student')->user()->regno }}" class="block">
                    <button class="w-full flex gap-1 items-center p-2 rounded-md hover:text-green-500 hover:bg-green-100 text-center transition-all">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Password Reset
                    </button>
                </a>
                <a href="/student/update/image/{{ auth('student')->user()->regno }}" class="block">
                    <button class="w-full flex gap-1 items-center p-2 rounded-md hover:text-green-500 hover:bg-green-100 text-center transition-all">
                        <i class="fa-solid fa-image"></i>
                        Update Image
                    </button>
                </a>
                <form action="/student/update/image/{{ auth('student')->user()->regno }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex gap-1 items-center p-2 rounded-md hover:text-green-500 hover:bg-green-100 text-center transition-all">
                        <i class="fa-solid fa-circle-minus"></i>
                        Remove Image
                    </button>
                </form>
            </div>            
        </div>
    </section>
    <script>
        // Javascript code to handle the alert
        document.getElementById("alertBox").style.display = "flex";
        setTimeout(() => {
            document.getElementById("alertBox").style.display = "none";
        }, 3000);
    </script>
    @endsection('content')
</body>
</html>