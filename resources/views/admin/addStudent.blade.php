<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amin | Add Student</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome/fontawesome-free-6.4.0-web/css/all.min.css')}}">
</head>
<body>
    <div class="flex items-center justify-center w-full h-full bg-green-100">
        <form action = "/admin/addStudent" method = "POST" class="grid grid-cols-3 gap-5 bg-white shadow-md rounded w-2/3  px-8 pt-10 pb-8">
            @csrf
        @if(Session::has('status'))
        <div class="flex justify-center items-center bg-green-100 text-green-600 text-center rounded-sm h-10">
            {{Session::get('status')}}
        </div>
        @endif
        @if($errors)
          @error('regno')
          <div class="flex justify-center items-center bg-red-100 text-red-600 text-center rounded-sm h-10">
            {{ $message }}
          </div>
          @enderror
        @endif
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
              <select  name="level" class="bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
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
        <div class="grid place-content-center">
          <button type="submit" class="flex  items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline focus:outline-green-200">
            add
            <i class="fa-regular fa-user-circle cursor-pointer"></i>
          </button>
        </div>
        </form>
      </div>

      <script>
        const id = document.getElementById('studentReg');
        const pwd = document.getElementById('studentPwd');

        id.addEventListener('input',()=>{
            pwd.value = id.value;
        })
      </script>
</body>
</html>