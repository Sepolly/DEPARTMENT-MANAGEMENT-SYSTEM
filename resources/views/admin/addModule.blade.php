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
        <form action = "/admin/addModule" method = "POST" class="flex flex-col justify-between bg-white shadow-md rounded w-1/4  px-8 pt-10 pb-8">
            @csrf
        @if(Session::has('status'))
        <div class="flex justify-center items-center bg-green-100 text-green-600 text-center rounded-sm h-10">
            {{Session::get('status')}}
        </div>
        @endif
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            Module code
            <input  name = "modulecode" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="code" autocomplete="off" autofocus>
            </label>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            module name
            <input  name = "modulename" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="module" autocomplete="off">
            </label>
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
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fname">
            lecturer contact
            <input  name = "lecturer_id" class="appearance-none bg-gray-100 rounded w-full h-12 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"  type="text" placeholder="lecturer contact" autocomplete="off">
            </label>
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
      </div>
</body>
</html>