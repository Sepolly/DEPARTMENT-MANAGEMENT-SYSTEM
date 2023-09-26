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
        <form action = "/admin/makeadmin" method = "POST" class="grid grid-cols w-1/2  gap-5 bg-white shadow-md rounded  px-8 pt-10 pb-8">
            @csrf
            @if(Session::has('success'))
                {{session::get('success')}}
            @endif
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
</body>
</html>