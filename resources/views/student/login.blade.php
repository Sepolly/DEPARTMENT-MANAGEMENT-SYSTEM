<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>EENG | student login</title>
</head>
<body>
    <div class="flex items-center justify-center w-full h-full bg-green-200">
        <form action = "/student/login" method = "POST" class="flex flex-col justify-around bg-white shadow-md rounded w-1/4 h-1/2 px-8 pt-10 pb-8 mb-4">
            @csrf
            @if(Session::has('error'))

            <div class = "bg-red-100 text-red-500 text-center rounded py-1">
              {{Session::get('error')}}
            </div>

            @endif
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="regNo">
              Username
            </label>
            <input value = "{{old('regno')}}" name = "regno" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-300" id="regNo" type="text" placeholder="registration number" autocomplete="off" autofocus>
            @if($errors)
                @error('regno')
                <p class = "text-red-400">
                    {{$message}}
                </p>
                @enderror
            @endif
        </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input value = "{{old('loginpassword')}}" name = "loginpassword" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-300 transition-all" id="password" type="password" placeholder="password">
            @if($errors)
                @error('loginpassword')
                <p class = "text-red-400">
                    {{$message}}
                </p>
                @enderror
            @endif
        </div>
          <div class="flex items-center justify-between">
            <button class="flex items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-green-200">
              Login
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.90039 7.56023C9.21039 3.96023 11.0604 2.49023 15.1104 2.49023H15.2404C19.7104 2.49023 21.5004 4.28023 21.5004 8.75023V15.2702C21.5004 19.7402 19.7104 21.5302 15.2404 21.5302H15.1104C11.0904 21.5302 9.24039 20.0802 8.91039 16.5402" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <g opacity="0.6">
                <path d="M2 12H14.88" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.6504 8.65039L16.0004 12.0004L12.6504 15.3504" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
            </svg>
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-600 focus:bg-gray-200" href="#">
              Forgot Password?
            </a>
          </div>
        </form>
      </div>
</body>
</html>