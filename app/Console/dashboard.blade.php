
    @auth('lecturer')
    {{-- Navigation bar and footer layout --}}
    @extends('layout.lecturerLayout')

    @section('content')

    <section class = "grid grid-cols-3 mt-5 container max-w-full p-5 bg-white gap-5">
        @if(count($modules) > 0)
            @foreach($modules as $module)
                <a href="/lecturer/module/{{$module->module_code}}" class = "block">
                    <div class = "bg-white h-48 text-gray-800  drop-shadow-2xl rounded-lg p-5 cursor-pointer hover:bg-green-50 transition-all">
                        <div class="flex gap-1 items-center">
                            <x-heroicon-o-book-open class="w-10"/>
                            <h2 class = "font-bold text-2xl gap-2">
                                {{$module->module_code . " "}}
                                {{$module->module_name}}
                            </h2>
                        </div>
                        <div class = "flex items-center gap-2 ">
                            <i class="fa-solid fa-chalkboard-user text-purple-700"></i>
                            <h6 class = "text-lg text-purple-700">                     
                                {{$module->lecturer->title . " "}}
                                {{$module->lecturer->first_name . " "}}
                                {{$module->lecturer->last_name . ""}}
                            </h6>
                        </div>
                        <h6>
                            Year: <span class = "font-bold text-lg">{{$module->level}}</span>
                        </h6>
                    </div>
                </a>
            @endforeach 
        @endif
    </section>
    @endsection
    
    @endauth
