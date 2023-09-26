
    @auth('student')
    {{-- Navigation bar and footer layout --}}
    @extends('layout.layout')

    @section('content')

    <section class = "grid grid-cols-3 container max-w-full p-5 bg-gray-50 gap-5">
        @if(count($modules) > 0)
            @foreach($modules as $module)
                <a href="/moduleview/{{$module->modulecode}}" class = "block">
                    <div class = "bg-green-400 h-48 text-white rounded-sm p-2 cursor-pointer hover:bg-green-500 transition-all">
                        <div class="flex gap-1 items-center">
                            <x-heroicon-o-book-open class="w-10"/>
                            <h2 class = "font-bold text-2xl gap-2">
                                {{$module->module_code . " "}}
                                {{$module->module_name}}
                            </h2>
                        </div>
                        <div class = "flex items-center gap-2">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <h6 class = "text-gray-100 text-lg">                     
                                {{$module->lecturer->title . " "}}
                                {{$module->lecturer->first_name . " "}}
                                {{$module->lecturer->last_name . ""}}
                            </h6>
                        </div>
                    </div>
                </a>
            @endforeach 
        @endif
    </section>
    @endsection
    
    @endauth
