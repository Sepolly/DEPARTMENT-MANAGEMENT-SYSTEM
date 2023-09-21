<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class = "container max-w-full border h-10"></nav>
    @if($role == 'student')
        @foreach ($data as $data)
            <div class = "container bg-gray-100 max-w-full p-2 border-b">
                {{$data['firstname']}}
                {{$data['lastname']}}
            </div>
        @endforeach
    @elseif($role == 'lecturer')
        @foreach ($data as $data)
            <div class = "container bg-gray-100 max-w-full p-2 border-b">
                {{$data['lecturername']}}
                {{$data['contact']}}
            </div>
        @endforeach
    @else
        @foreach ($data as $data)
            <div class = "container bg-gray-100 max-w-full p-2 border-b">
                {{$data['modulecode']}}
                {{$data['modulename']}}
                {{-- <p>{{$lecturer}}</p> --}}
            </div>
        @endforeach

    @endif
</body>