<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome/fontawesome-free-6.4.0-web/css/all.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <title>Admin</title>
</head>
<body x-data = "{toggle: false}" class = "relative">
    {{-- nav-bar --}}
    <nav 
    :class = "toggle ? 'fixed w-[92%] h-14 border-l-2 px-6 py-2 border-l-gray-100 bg-white top-0 right-0 flex justify-between items-center ' 
    : 'fixed w-4/5 h-14 border-l-2 px-6 py-2 border-l-gray-100 bg-white top-0 right-0 flex justify-between items-center' ">
        {{-- SEARCH-BAR --}}
        <div>
            <label class = "bg-green-50 bg-opacity-50 py-2 rounded-md px-2 focus:outline-2">
                <i class="fa-solid fa-search text-sm text-gray-400 ml-2 align-middle"></i>
                <input 
                class = "bg-transparent h-full focus:outline-none placeholder:p-4 text-lg text-gray-300" 
                type="search" 
                name="" 
                id=""
                placeholder="search"
                >
            </label>
        </div>
        {{-- ADMIN PROFILE --}}
        <div x-data = "{toggle: false}" class = "flex gap-3 items-center duration-300">
            <span class = "object-contain">
                <img class = "w-10 h-10 rounded-full" src="{{asset('images/admin.jpg')}}" alt="">
            </span>
            <span class = "relative">
                <h5>Dr. Samba Sesay</h5>
                <p class = "font-light text-gray-500">Administrator</p>
            </span>
            <i x-show = "!toggle" @click = "toggle = !toggle" @click.outside = "toggle = false" 
            class="fa-solid fa-chevron-right cursor-pointer duration-300"></i>
            <i x-show = "toggle" @click = "toggle = !toggle" @click.outside = "toggle = false" 
            class="fa-solid fa-chevron-left cursor-pointer duration-300"></i>
            {{-- PROFILE DROPDOWN LINKS --}}
            <div 
            x-show = "toggle"
            x-transition
            class="flex justify-evenly items-center w-32 h-14 bg-white rounded">
                <a href="" class = "text-center leading-10 hover:opacity-70 h-10 transition-all">Profile</a>
                <a href="/admin/logout" class = "text-center leading-10 hover:opacity-70 h-10 transition-all">Logout</a>
            </div>
        </div>
    </nav>

    {{------------------------------------------ SIDE-BAR ----------------------------------------------}}

    <aside
    :class = "toggle ? 'fixed w-[8%] p-2 h-screen bg-white duration-300' : 'fixed w-1/5 h-screen bg-white duration-300' "
    >

        {{-- logo AND TOGGLE BUTTON --}}
        <div 
        :class = "toggle ? 'relative p-5 flex justify-between items-center h-12 duration-300' : 'relative h-14 flex justify-between items-center p-5 duration-300' "
        >
            <span class = "font-bold text-xl">EENG</span>
            {{-- toggle button --}}
            <button
            @click = "toggle = !toggle" 
            :class="toggle ? 
            'z-50 absolute -right-4 flex justify-center items-center w-6 h-6 rounded-full drop-shadow bg-gray-50 transition-all duration-300' : 
            'z-50 absolute -right-4 flex justify-center items-center w-6 h-6 rounded-full drop-shadow bg-gray-50 hover:bg-gray-50 transition-all duration-300' ">
                <i class="fa-solid fa-chevron-right text-sm cursor-pointer font-light text-green-500"></i>
            </button>
        </div>

        {{-- SIDE BAR MENU --}}
        <div class = "grid grid-cols-1 p-5 gap-2">
            
        {{-- Dashboard Link --}}
            <a href="/admin" 
            :class = "toggle ? 'h-12 flex items-center justify-center bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 'flex items-center gap-10 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-md pl-5 h-12' ">
                <i class="fa-solid fa-bars-staggered text-green-500"></i>
                <span x-show = "!toggle">Dashboard</span>
            </a>

            {{-- student drop down menu --}}
            <button @click = "open = !open" @click.outside = "open = false" x-data = "{open: false}">
                <span 
                :class = "toggle ? 'flex items-center justify-center h-12 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 
                'flex items-center gap-10 pl-5 py-3 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' "
                >   
                    {{-- Student Icon --}}
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span x-show = "!toggle">Students</span>

                    {{-- chevron when the side bar is expanded --}}
                    <span x-show = "!open" :class = "toggle ? 'absolute flex items-center justify-center  -right-2 w-5 h-5 rounded-full text-sm text-gray-50 bg-gray-400' : '' "><i class="fa-solid fa-chevron-right"></i></span>

                    {{-- chevron when the sidde bar is collapsed --}}
                    <span x-show = "open" :class = "toggle ? 'absolute flex items-center justify-center  -right-2 w-5 h-5 rounded-full text-sm text-gray-50 bg-gray-400' : '' "><i class="fa-solid fa-chevron-down"></i></span>
                    
                </span>

                {{-- Student added action when the side bar is expanded --}}
                <span x-show = "open"
                x-transition
                    :class = "toggle ? 'flex flex-col justify-evenly text-sm opacity-70 p-2' : 'flex justify-around items-center opacity-70 text-sm py-2 pl-2' ">
                    <a href="/admin/addStudent">
                        <i class="fa-solid fa-user-plus"></i>
                        add
                    </a>
                    <a href="">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </a>
                </span>
            </button>

            {{-- Lecturer dropdown menu --}}
            <button @click = "open = !open" @click.outside = "open = false" x-data = "{open: false}">
                <span 
                :class = "toggle ? 'flex items-center justify-center h-12 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 
                'flex items-center gap-10 pl-5 py-3 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' "
                >
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <span x-show = "!toggle">Lecturers</span>

                    {{-- chevron when the side bar is expanded --}}
                    <span x-show = "!open" :class = "toggle ? 'absolute flex items-center justify-center  -right-2 w-5 h-5 rounded-full text-sm text-gray-50 bg-gray-400' : '' "><i class="fa-solid fa-chevron-right"></i></span>

                    {{-- chevron when the sidde bar is collapsed --}}
                    <span x-show = "open" :class = "toggle ? 'absolute flex items-center justify-center  -right-2 w-5 h-5 rounded-full text-sm text-gray-50 bg-gray-400' : '' "><i class="fa-solid fa-chevron-down"></i></span>
                    
                </span>
                {{-- Lecturer added actions --}}
                <span x-show = "open"
                x-transition
                    :class = "toggle ? 'flex flex-col justify-evenly text-sm opacity-70 p-2' 
                    : 'flex justify-around items-center opacity-70 text-sm py-2 pl-2' ">
                    <a href="/admin/addLecturer">
                        <i class="fa-solid fa-user-plus"></i>
                        add
                    </a>
                    <a href="">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </a>
                </span>
            </button>

            {{-- Modules drop down menu --}}
            <button @click = "open = !open" @click.outside = "open = false" x-data = "{open: false}">
                <span 
                :class = "toggle ? 'flex items-center justify-center h-12 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 
                'flex items-center gap-10 pl-5 py-3 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' "
                >
                    <i class="fa-solid fa-book-open-reader"></i>
                    <span x-show = "!toggle">Modules</span>

                    {{-- chevron when the side bar is expanded --}}
                    <span x-show = "!open" :class = "toggle ? 'absolute flex items-center justify-center  -right-2 w-5 h-5 rounded-full text-sm text-gray-50 bg-gray-400' : '' "><i class="fa-solid fa-chevron-right"></i></span>

                    {{-- chevron when the sidde bar is collapsed --}}
                    <span x-show = "open" :class = "toggle ? 'absolute flex items-center justify-center  -right-2 w-5 h-5 rounded-full text-sm text-gray-50 bg-gray-400' : '' "><i class="fa-solid fa-chevron-down"></i></span>
                    
                </span>
                {{-- Modules added action --}}
                <span x-show = "open"
                x-transition
                    :class = "toggle ? 'flex flex-col justify-evenly text-sm opacity-70 p-2' 
                    : 'flex justify-around items-center opacity-70 text-sm py-2 pl-2' ">
                    <a href="/admin/addModule">
                        <i class="fa-solid fa-plus"></i>
                        add
                    </a>
                    <a href="">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </a>
                </span>
            </button>

            <a href="" 
            :class = "toggle ? 'h-12 flex items-center justify-center bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 'flex items-center gap-10 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-md pl-5 h-12' ">
                <i class="fa-solid fa-calendar-days text-green-500"></i>
                <span x-show = "!toggle">Events</span>
            </a>

            <a href="" 
            :class = "toggle ? 'h-12 flex items-center justify-center bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 'flex items-center gap-10 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-md pl-5 h-12' ">
                <i class="fa-solid fa-square-poll-vertical text-green-500"></i>
                <span x-show = "!toggle">Result</span>
            </a>

            <a href="" 
            :class = "toggle ? 'h-12 flex items-center justify-center bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 'flex items-center gap-10 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-md pl-5 h-12' ">
                <i class="fa-solid fa-flask-vial text-green-500"></i>
                <span x-show = "!toggle">Laboratory</span>
            </a>

            <a href="" 
            :class = "toggle ? 'h-12 flex items-center justify-center bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-lg' : 'flex items-center gap-10 bg-gray-100 bg-opacity-80 backdrop-blur-lg rounded-md pl-5 h-12' ">
                <i class="fa-solid fa-user text-green-500"></i>
                <span x-show = "!toggle">Employees</span>
            </a>
    
        </div>
    </aside>

    {{-- content --}}
    <section 
    :class = "toggle 
    ? 'absolute p-5 h-[calc(100vh-40px)] w-[92%] right-0 top-14 bg-gray-100 duration-300' 
    : 'absolute p-5 h-[calc(100vh-40px)] w-4/5 right-0 top-14 bg-gray-100 duration-300' "
    >
        @yield('content')
    </section>

    {{-- footer --}}
    <footer 
    :class = "toggle ? 
    'w-full fixed left-[8%] border-l-2 text-gray-600 border-gray-100 bottom-0 h-10 p-2 bg-white duration-300' 
    : 'w-full fixed left-[20%] border-l-2 text-gray-600 border-gray-100 bottom-0 h-10 p-2 bg-white duration-300' ">
        <div class = "font-medium ml-56">
            &copy; <?php echo Date("Y"); ?>
            ELECTRICAL AND ELECTRONICS DEPARTMENT MANAGEMENT SYSTEM
        </div>
    </footer>
</body>
</html>