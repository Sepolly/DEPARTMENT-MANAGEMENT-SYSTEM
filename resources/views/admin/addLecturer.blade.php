<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex items-center justify-center w-full h-full bg-green-100">
        <form action = "/admin/addLecturer" method = "POST" class="grid grid-cols-3 gap-5 bg-white shadow-md rounded w-3/4  px-8 pt-10 pb-8">
            @csrf
        @if(Session::has('status'))
        <div class="flex justify-center items-center bg-green-100 text-green-600 text-center rounded-sm h-10">
            {{Session::get('status')}}
        </div>
        @endif
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">
            ID
            <input  name = "id" id="lecturerID" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="lecturer id" autocomplete="off" autofocus>
            </label>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            first name
            <input  name = "first_name" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="first name" autocomplete="off">
            </label>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            last name
            <input  name = "last_name" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="last name" autocomplete="off">
            </label>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">
            Phone
            <input  name = "phone" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="contact" autocomplete="off">
            </label>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            User type
            <input value="lecturer"  name = "usertype" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="user type" autocomplete="off">
            </label>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            Title
            <input  name = "title" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="title" autocomplete="off">
            </label>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            email
            <input  name = "email" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="email" placeholder="email" autocomplete="off">
            </label>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            Address
            <input  name = "address"  class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="password" placeholder="address" autocomplete="off">
            </label>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            Password
            <input id="lecturerPwd"  name = "password" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="password" placeholder="password" autocomplete="off">
            </label>
        </div>

        <div class="grid place-content-center">
            <a href = "/admin" class = "flex  items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline focus:outline-green-200">
              back
            </a>
          </div>
          <div class="grid place-content-center">
            <button type="submit" class="flex  items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline focus:outline-green-200">
              add
              <i class="fa-regular fa-user-circle cursor-pointer"></i>
            </button>
          </div>

        </form>
      </div>

      <script>
        const id = document.getElementById('lecturerID');
        const pwd = document.getElementById('lecturerPwd');

        id.addEventListener('input',()=>{
            pwd.value = id.value;
        })
      </script>
</body>