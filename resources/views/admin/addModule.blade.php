
    @extends('layout.adminLayout')

    @section('content')
    {{-- success alert --}}
    @if(Session::has('status'))
      <div id = "alertBox" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-2xl shadow-2xl w-64 h-14 flex justify-center items-center gap-2 bg-white text-green-500 text-center rounded duration-300">
          <i class="fa-solid fa-circle-check"></i>
          {{Session::get('status')}}
      </div>
    @endif

    <form action = "/admin/addModule" method = "POST" class="grid grid-cols gap-5 bg-white shadow-md rounded  px-8 pt-10 pb-8">
      @csrf
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
          Module code
          <input  name = "module_code" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="code" autocomplete="off" autofocus>
          </label>
          @error('module_code')
            <p class="text-red-400 font-light">{{$message}}</p>
          @enderror
      </div>
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
          module name
          <input  name = "module_name" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="module" autocomplete="off">
          </label>
          @error('module_name')
            <p class="text-red-400 font-light">{{$message}}</p>
          @enderror
      </div>
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2">
            level
            <select name="level" class="bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
              <option class="hover:bg-none" value="2">year 2</option>
              <option value="3">year 3</option>
              <option value="4">year 4</option>
              <option value="5">year 5</option>
            </select>
          </label>
      <div>
          <label class="block text-gray-700 text-sm font-bold mb-2">
          lecturer
          <select name="lecturer_id" class="bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
            @foreach($lecturers as $lecturer)
              <option class="hover:bg-none drop-shadow-lg" value="{{$lecturer->id}}">
                {{$lecturer->title . " " . $lecturer->first_name . " " . $lecturer->last_name}}
              </option>
            @endforeach
          </select>
          </label>
          @error('lecturer_id')
            <p class="text-red-400 font-light">{{$message}}</p>
          @enderror
      </div>

      <div class="flex justify-between">
          <a href = "/admin" class = "flex items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            back
          </a>
          <button class="flex items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            add
          </button>
      </div>

      </form>
    <script>
      document.getElementById("alertBox").style.display = "flex";
      setTimeout(() => {
        document.getElementById("alertBox").style.display = "none";
      }, 3000);
    </script>
    @endsection