
    {{-- Navigation bar and footer layout --}}
    @extends('layout.studentLayout')

    @section('content')

    <section class = "grid grid-cols-3 mt-5 container max-w-full p-5 bg-white gap-5">
        @if(count($modules) > 0)
            @foreach($modules as $module)
                <a href="/student/module/{{$module->module_code}}" class = "block">
                    <div class = " bg-white h-48 text-gray-800  drop-shadow-2xl rounded-lg p-5 cursor-pointer hover:bg-green-50 transition-all">
                        <div>
                            <h2 class = "font-bold text-2xl gap-2 flex">
                                <x-heroicon-o-book-open class="w-10"/>
                                {{$module->module_name}}
                            </h2>
                            <h3>
                                {{$module->module_code . " "}}
                            </h3>
                        </div>
                        <div class = "flex items-center gap-2 text-purple-700">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <h6 class = "text-lg">                     
                                {{$module->lecturer->title . " "}}
                                {{$module->lecturer->first_name . " "}}
                                {{$module->lecturer->last_name . ""}}
                            </h6>
                        </div>
                       <div class = "grid grid-cols-3 gap-2">
                        <span><i class="fa-solid fa-list-check"></i>Assignments: <span class = "font-bold">{{count($module->assignments)}}</span></span>
                        <span><i class="fa-solid fa-note-sticky"></i>Notes: <span class = "font-bold">{{count($module->notes)}}</span></span>
                       </div>
                    </div>
                </a>
            @endforeach
            @else
            <div class="flex w-full h-full justify-center items-center font-md">
                No modules added yet
            </div> 
        @endif
    </section>
    @endsection
    
