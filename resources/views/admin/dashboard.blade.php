
@extends('layout.adminLayout')
@section('content')
    <section class="grid gap-2">
        {{-- year 2 --}}
        <h3>Year 2</h3>
        <div class="grid grid-cols-3 gap-4">
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                students: {{count($students->where('level',2))}}
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">   
                lecturers: 
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                modules:
            </div>
        </div>
        {{-- Year 3 --}}
        <h3>Year 3</h3>
        <div class="grid grid-cols-3 gap-4">
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                students: {{count($students->where('level',3))}}
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">   
                lecturers: 
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                modules:
            </div>
        </div>
        {{-- Year 4 --}}
        <h3>Year 4</h3>
        <div class="grid grid-cols-3 gap-4">
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                students: {{count($students->where('level',4))}}
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">   
                lecturers: 
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                modules:
            </div>
        </div>
        {{-- Year 5 --}}
        <h3>Year 5</h3>
        <div class="grid grid-cols-3 gap-4">
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                students: {{count($students->where('level',5))}}
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">   
                lecturers: 
            </div>
            <div class="w-64 h-20 bg-white p-4 rounded-md">
                modules:
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                Total Students: {{count($students)}}
            </div>
            <div>
                Total Lecturers: {{count($lecturers)}}
            </div>
            <div>
                Total Modules: {{count($modules)}}
            </div>
        </div>
    </section>
@endsection