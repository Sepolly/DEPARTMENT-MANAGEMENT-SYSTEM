
    @auth('student')
    {{-- Navigation bar and footer layout --}}
    @extends('layout.layout')

    @section('content')

    <section class = "grid grid-cols-3 container max-w-full p-5 bg-gray-50 gap-5">
        @if(count($lecturers) > 0)
            @foreach($lecturers as $lecturer)
                @foreach($lecturer->modules as $module)
                <a href="/moduleview/{{$module->modulecode}}" class = "block">
                    <div class = "bg-green-400 h-48 text-white rounded-sm p-2 cursor-pointer hover:bg-green-500 transition-all">
                        <div class="flex gap-1 items-center">
                            <x-heroicon-o-book-open class="w-10"/>
                            <h2 class = "font-bold text-2xl gap-2">
                                {{$module->modulecode . " "}}
                                {{$module->modulename}}
                            </h2>
                        </div>
                @endforeach
                    <div class = "flex items-center gap-2">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <h6 class = "text-gray-100 text-lg">                     
                            {{$lecturer->title . " "}}
                            {{$lecturer->firstname . " "}}{{$lecturer->lastname}}
                        </h6>
                    </div>
                </div>
                </a>
            @endforeach
        @endif
    </section>

    @endsection
    
    @endauth
