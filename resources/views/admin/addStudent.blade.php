
@extends('layout.adminLayout')

@section('content')
      @if(Session::has('status'))
      <div id = "alertBox" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-2xl shadow-2xl w-64 h-14 flex justify-center items-center gap-2 bg-white text-green-500 text-center rounded duration-300">
          <i class="fa-solid fa-circle-check"></i>
          {{Session::get('status')}}
      </div>
      @endif
      <form action = "/admin/addStudent" method = "POST" class="grid grid-cols-3 gap-5 bg-white shadow-md rounded p-5">
      @csrf
      
      {{-- registration number --}}
      <div>
        <label  class="block text-gray-700 text-sm font-bold mb-2">
          registration number
          <input id="studentReg"  name = "regno" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="registration number" autocomplete="off" autofocus>
        </label>
      </div>
      {{-- first name --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            first name
          <input  name = "first_name" value = "{{old('firstname')}}" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="first name" autocomplete="off">
          </label>
      </div>
      {{-- last name --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            last name
            <input  name = "last_name" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="last name" autocomplete="off">
          </label>
      </div>
      {{-- other name --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2">
            other name
            <input  name = "other_name" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="other name" autocomplete="off">
          </label>
      </div>
      {{-- usertype --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2">
            user type
            <input  name = "usertype" value = "student" class="appearance-none  bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="user type" autocomplete="off">
          </label>
      </div>
      {{-- Phone --}}
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">
          phone
          <input  name = "phone" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="tel" placeholder="phone">
        </label>
      </div>
      {{-- level --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2">
            level
            <select id = "level" name="level" class="bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
              <option value="2">year 2</option>
              <option value="3">year 3</option>
              <option value="4">year 4</option>
              <option value="5">year 5</option>
            </select>
          </label>
      </div>
      {{-- status --}}
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">
          status
          <input  name = "status" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="number" placeholder="status">
        </label>
      </div>
      {{-- isrepeating --}}
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">
          <p>Repeater</p>
          <span class="flex justify-center items-center rounded bg-gray-100 w-full h-12 py-2 px-3 gap-2">
            <span>yes</span>
            <input type="radio" name = "is_repeating" value="true">
            <span>no</span>
            <input type="radio" name = "is_repeating" value="false">
          </span>
        </label>
      </div>
      {{-- address --}}
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">
          address
          <input  name = "address" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="address">
        </label>
      </div>
      {{-- date of birth --}}
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">
          date of birth
          <input  name = "date_of_birth" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="date" placeholder="date of birth">
        </label>
      </div>
      {{-- email --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2">
            email
            <input  name = "email" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="email" placeholder="email">
          </label>
      </div>
      {{-- password --}}
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          password
          <input id="studentPwd" name = "password" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="password" placeholder="default should be the regno" autocomplete="off">
          </label>
      </div>

      <div class="grid place-content-center">
        <a href = "/admin" class = "flex  items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline focus:outline-green-200">
          back
        </a>
      </div>
      <div x-data = "{loading: false}" class="grid place-content-center">
        <button @click = "loading = true" type="submit" class="flex  items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline focus:outline-green-200">
          add
          <i x-show = "!loading" class="fa-regular fa-user-circle cursor-pointer"></i>
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
      </div>
      </form>
      <script>
        const id = document.getElementById('studentReg');
        const pwd = document.getElementById('studentPwd');
        
        id.addEventListener('input',()=>{
            pwd.value = id.value;
        });
  
        // Javascript code to handle the alert
        document.getElementById("alertBox").style.display = "flex";
        setTimeout(() => {
            document.getElementById("alertBox").style.display = "none";
        }, 3000);
  
      </script>
    @endsection
