<nav class="container max-w-full h-12 border flex justify-between items-center px-5 bg-gray-100 top-0 left-0 right-0">
    @if(auth('student')->check() && auth('student')->user())
    <span class="flex items-center gap-2 w-auto h-full p-1">
        <a href="/student/profile/{{ auth('student')->user()->regno }}">
            @if (auth('student')->user()->image)
                <img src="{{ asset('/images/profile/' . auth('student')->user()->image) }}" alt="" class="h-10 w-10 rounded-full">
            @else
                <img src="{{ asset('/images/profile/profile-default.png') }}" alt="" class="h-10 w-10 rounded-full">
            @endif
        </a>
        <p class="text-lg flex">
            {{ auth('student')->user()->firstname }}
            {{ auth('student')->user()->lastname }}
        </p>
    </span>
    @endif
    <div class = "flex gap-1">
        <a href="/student">dashboard</a>
        <a href="/student/logout" class="flex h-6 justify-center items-center text-white bg-red-500 px-3 py-3 rounded hover:bg-red-600">
            logout
        </a>
    </div>
</nav>