<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>EENG | student login</title>
</head>
<body>
    <div style = "background-image: url('{{asset('images/circuit.jpg')}}')" class="flex items-center justify-center w-full h-full bg-cover bg-center bg-blend-multiply">
        <form action = "/student/login" method = "POST" class="flex flex-col justify-around bg-white bg-opacity-5 backdrop-blur-lg shadow-md rounded-xl w-1/4 min-h-1/2 px-8 pt-10 pb-8 mb-4">
            @csrf
            <div>
              <center>
                <h1 class = "mb-4 text-xl text-white">STUDENT LOGIN</h1>
              </center>
            </div>
            @if(Session::has('error'))
              <p id = "alertBox" class="text-red-400 font-light">
                {{Session::get('error')}}
              </p>
            @endif
            <div class="mb-4">
            <label class="block text-gray-400 text-sm font-bold mb-2" for="regNo">
              Registration number
            </label>
            <input 
            value = "{{old('regno')}}" 
            name = "regno" 
            class="bg-gray-100 bg-opacity-20 backdrop-blur-sm rounded w-full h-12 py-2 px-3 text-gray-100 leading-tight focus:outline-none focus:bg-gray-600 transition-colors" id="regNo" type="text" placeholder="registration number" autocomplete="off" autofocus>
            @if($errors)
                @error('regno')
                <p class = "text-red-400">
                    {{$message}}
                </p>
                @enderror
            @endif
        </div>
          <div class="mb-6">
            <label class="block text-gray-400 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input 
            value = "{{old('password')}}" 
            name = "password" 
            class="bg-gray-100 bg-opacity-20 backdrop-blur-sm rounded w-full h-12 py-2 px-3 text-gray-100 leading-tight focus:outline-none focus:bg-gray-600 transition-colors" id="password" type="password" placeholder="password">
            @if($errors)
                @error('password')
                <p class = "text-red-400">
                    {{$message}}
                </p>
                @enderror
            @endif
        </div>
          <div x-data = "{loading: false}" class="flex items-center justify-between">
            <button
            @click = "loading = true"
            class="flex items-center justify-center gap-1 bg-white bg-opacity-20 backdrop-blur hover:bg-opacity-10 text-white font-bold py-2 px-4 rounded focus:outline-none focus:outline-gray-200 transition-colors">
              Login
              {{-- login svg --}}
              <svg x-show = "!loading" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.90039 7.56023C9.21039 3.96023 11.0604 2.49023 15.1104 2.49023H15.2404C19.7104 2.49023 21.5004 4.28023 21.5004 8.75023V15.2702C21.5004 19.7402 19.7104 21.5302 15.2404 21.5302H15.1104C11.0904 21.5302 9.24039 20.0802 8.91039 16.5402" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <g opacity="0.6">
                <path d="M2 12H14.88" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.6504 8.65039L16.0004 12.0004L12.6504 15.3504" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
              </svg>
              {{-- loading svg --}}
              <svg x-show = "loading" width="20" height="20" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="2">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform
                                attributeName="transform"
                                type="rotate"
                                from="0 18 18"
                                to="360 18 18"
                                dur="1s"
                                repeatCount="indefinite"/>
                        </path>
                    </g>
                </g>
            </svg>
            </button>
            <a href = "/student/passwordReset" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-green-600 focus:bg-gray-200">
              Forgot Password?
            </a>
          </div>
          <p class = "font-light text-gray-200 m-2 text-sm">
            For newly added students your default password is your registration number
          </p>
          <a href="/" class = "block m-auto text-gray-400 hover:underline font-light">home</a>
        </form>
      </div>

      <script>
        // Javascript code to handle the alert
        document.getElementById("alertBox").style.display = "flex";
        setTimeout(() => {
            document.getElementById("alertBox").style.display = "none";
        }, 3000);
      </script>
</body>
</html>