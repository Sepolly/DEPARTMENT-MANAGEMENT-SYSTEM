@extends('layout.layout')

@section('content')


<section class="grid grid-cols-2 gap-5 p-5 h-[calc(100%-3rem)]">

    <div class = "grid grid-rows-2 gap-5">
        <div class = "drop-shadow-2xl rounded-xl bg-white p-8">
            <h2 class = "font-bold text-3xl">{{$module->module_name}}</h2>
            <p class = "text-gray-600">{{$module->module_code}}</p>
            <p class = "text-gray-600">
                {{$module->lecturer->title . " " . $module->lecturer->first_name . " " . $module->lecturer->last_name}}
            </p>
        </div>
        <div class = " grid drop-shadow-2xl rounded-xl bg-white row-span-6 p-8">
            <h3 class = "font-bold">DESCRIPTION</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam assumenda, quidem, aliquid expedita cum culpa fugiat laborum modi voluptatibus pariatur, est eum? Repellat totam dolor eum pariatur culpa tempore eius, doloribus consequuntur doloremque? Suscipit quas eum accusantium. Itaque quis nisi error libero odit fugiat repellendus voluptatum excepturi aperiam, provident rem?</p>
            <hr>
            <h3 class = "font-bold">OBJECTIVES</h3>
            <ul class = "list-disc list-inside">
                <li>objective 1</li>
                <li>objecte 2</li>
                <li>objective 3</li>
            </ul>
        </div>
    </div>

    <div class = "grid grid-rows-2 p-5 drop-shadow-2xl rounded-xl bg-white">
        <div>
            Attendance table
        </div>
        <div>
            Attendance chart
        </div>
    </div>

</section>
<div class = "drop-shadow-xl rounded-xl bg-white">
    <div>
        Notes
    </div>
    <div>
        Assignment
    </div>
    <div>
        Test
    </div>
    <div>
        Performance Chart
    </div>
</div>



@endsection