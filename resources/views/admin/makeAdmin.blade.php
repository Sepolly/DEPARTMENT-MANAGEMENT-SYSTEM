<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome/fontawesome-free-6.4.0-web/css/all.min.css')}}">
</head>
<body>
    <div class=" relative flex items-center justify-center w-full h-full bg-green-100">
      @if(Session::has('success'))
      <div id = "alertBox" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-2xl shadow-2xl w-64 h-14 flex justify-center items-center gap-2 bg-white text-green-500 text-center rounded duration-300">
          <i class="fa-solid fa-circle-check"></i>
          {{Session::get('success')}}
      </div>
      @elseif(Session::has("warning"))
      <div id = "alertBox" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-2xl shadow-2xl w-64 h-14 flex justify-center items-center gap-2 bg-white text-orange-500 text-center rounded">
        <i class="fa-solid fa-triangle-exclamation"></i>
        {{Session::get('warning')}}
      </div>
      @endif
        <form action = "/admin/makeadmin" method = "POST" class="grid grid-cols w-1/2  gap-5 bg-white shadow-md rounded  px-8 pt-10 pb-8">
            @csrf
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
            <div class="flex justify-between">
                <a href = "/admin" class = "flex items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                  back
                </a>
                <button type="submit" class="flex items-center justify-center gap-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                  make admin
                </button>
            </div>
        </div>
        </form>
      </div>

      <script>
        document.getElementById("alertBox").style.display = "flex";
        setTimeout(() => {
            document.getElementById("alertBox").style.display = "none";
        }, 3000);
      </script>
</body>
</html>