<nav class="fixed z-10 max-w-full h-12 border flex justify-between items-center px-5 bg-white shadow-lg top-0 left-0 right-0">
    
    <span class="flex items-center gap-2 w-auto h-full p-1">

        <a href="/lecturer/profile/{{ auth('lecturer')->user()->id }}">

            @if (auth('lecturer')->user()->image)
                @if(auth('lecturer')->user()->status == 10)
                    <img src="{{ asset('/images/profile/' . auth('lecturer')->user()->image) }}" alt="" class="h-10 w-10 rounded-full border-2 border-purple-500">
                @elseif(auth('lecturer')->user()->status >= 5)
                    <img src="{{ asset('/images/profile/' . auth('lecturer')->user()->image) }}" alt="" class="h-10 w-10 rounded-full border-2 border-green-500">
                @else
                    <img src="{{ asset('/images/profile/' . auth('lecturer')->user()->image) }}" alt="" class="h-10 w-10 rounded-full border-2 border-yellow-500">
                @endif
            @else
                <img src="{{ asset('/images/profile/profile-default.png') }}" alt="" class="h-10 w-10 rounded-full">
            @endif

        </a>

        <p class="text-lg flex">
            {{ auth('lecturer')->user()->title }}
            {{ auth('lecturer')->user()->first_name }}
            {{ auth('lecturer')->user()->last_name }}
        </p>

    </span>

    <div class = "flex gap-1">
        <a href="/lecturer">dashboard</a>
        <a href="/lecturer/logout" class="flex h-6 justify-center items-center text-white bg-red-500 px-3 py-3 rounded hover:bg-red-600">
            logout
        </a>
    </div>
</nav>