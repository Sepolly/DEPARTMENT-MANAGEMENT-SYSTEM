
    
    @extends('layout.adminLayout')

    @section('content')
    {{-- success alert --}}
    @if(Session::has('status'))
    <div id = "alertBox" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-2xl shadow-2xl w-64 h-14 flex justify-center items-center gap-2 bg-white text-green-500 text-center rounded duration-300">
        <i class="fa-solid fa-circle-check"></i>
        {{Session::get('status')}}
    </div>
    @endif
    
    <form action = "/admin/addLecturer" method = "POST" class="grid grid-cols-3 gap-5 bg-white shadow-md rounded px-8 pt-10 pb-8">
        @csrf
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
        <input  name = "address"  class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100" type = "text" placeholder="address" autocomplete="off">
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
    // passeses lecturers id entered as its default password
    const id = document.getElementById('lecturerID');
    const pwd = document.getElementById('lecturerPwd');

    id.addEventListener('input',()=>{
        pwd.value = id.value;
    })

    // Alert status value and dissappears after 3 seconds
    document.getElementById("alertBox").style.display = "flex";
    setTimeout(() => {
        document.getElementById("alertBox").style.display = "none";
    }, 3000);
    </script>
    @endsection
